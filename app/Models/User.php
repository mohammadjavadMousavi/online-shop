<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\OtpMail;
use App\Models\Product;




class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public static function generateOtp(Request $request)
    {
        
        $otp=random_int(11111, 99999);

        $userOtp=User::query()->where('email',$request->get('email'));

        if ($userOtp->exists()) {

            $user=$userOtp->first();

            $user->update([
                'password' => bcrypt($otp)
            ]);

        }else{

            $user=User::query()->create([
                'email' => $request->get('email'),
                'password' => bcrypt($otp),
                'role_id' => Role::findByTitle('user')->id
            ]);

        }
        
        Mail::to($user->email)->send(new OtpMail($otp));

        return $user;

    }

    public function likes()
    {
        return $this->belongsToMany(Product::class, 'likes')
        ->withTimestamps();
    }

    public function likePro(Product $product)
    {

        $isLike=$this->likes()->where('product_id',$product->id);

        if ($isLike->exists()) {
            return $this->likes()->detach($product);
        }

        return $this->likes()->attach($product);
    }
}

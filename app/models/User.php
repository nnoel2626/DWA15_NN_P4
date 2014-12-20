<?php

use Illuminate\Auth\UserTrait;

use Illuminate\Auth\UserInterface;

use Illuminate\Auth\Reminders\RemindableTrait;

use Illuminate\Auth\Reminders\RemindableInterface;


class User extends Eloquent implements UserInterface, RemindableInterface {


//     protected $fillable =
//         ['email', 'username', 'password', 'password_temp', 'code', 'active'];

// 	/**
// 	 * The database table used by the model.
// 	 *
// 	 * @var string
// 	 */
// 	protected $table = 'users';

// 	/**
// 	 * The attributes excluded from the model's JSON form.
// 	 *
// 	 * @var array
// 	 */
// 	protected $hidden = array('password');

// 	/**
// 	 * Get the unique identifier for the user.
// 	 *
// 	 * @return mixed
// 	 */
// 	public function getAuthIdentifier()
// 	{
// 		return $this->getKey();
// 	}

// 	/**
// 	 * Get the password for the user.
// 	 *
// 	 * @return string
// 	 */
// 	public function getAuthPassword()
// 	{
// 		return $this->password;
// 	}

// 	*
// 	 * Get the token value for the "remember me" session.
// 	 *
// 	 * @return string
	 
// 	public function getRememberToken()
// 	{
// 		return $this->remember_token;
// 	}

// 	/**
// 	 * Set the token value for the "remember me" session.
// 	 *
// 	 * @param  string  $value
// 	 * @return void
// 	 */
// 	public function setRememberToken($value)
// 	{
// 		$this->remember_token = $value;
// 	}

// 	/**
// 	 * Get the column name for the "remember me" token.
// 	 *
// 	 * @return string
// 	 */
// 	public function getRememberTokenName()
// 	{
// 		return 'remember_token';
// 	}

// 	/**
// 	 * Get the e-mail address where password reminders are sent.
// 	 *
// 	 * @return string
// 	 */
// 	public function getReminderEmail()
// 	{
// 		return $this->email;
// 	}

// }




			use UserTrait, RemindableTrait;
			/**
			* The database table used by the model.
			*
			* @var string
			*/
			protected $table = 'users';
			/**
			* The attributes excluded from the model's JSON form.
			*
			* @var array
			*/
			protected $hidden = array('password', 'remember_token');
			/**
			* http://laravel.com/docs/4.2/mail
			*/
			public function sendWelcomeEmail() {
			# Create an array of data, which will be passed/available in the view
			$data = array('user' => Auth::user());
			Mail::send('emails.welcome', $data, function($message) {
			$recipient_email = $this->email;
			$recipient_name = $this->first_name.' '.$this->last_name;
			$subject = 'Welcome '.$this->first_name.'!';
			$message->to($recipient_email, $recipient_name)->subject($subject);
			});
			}
			}

<?php
namespace App\Http\Controllers\API\Resources;

use App\Http\Controllers\API\ApiController; 
use Illuminate\Http\Request; 

use App\User; 

class UserResourceController extends ApiController
{
	public function __construct(User $user) {
		$this->model = $user;
	}
}

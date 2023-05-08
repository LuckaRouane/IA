<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Admin
 * 
 * @property int $idadmin
 * @property string $nom
 * @property string $mdp
 *
 * @package App\Models
 */
class Admin extends Model
{
	protected $table = 'admin';
	protected $primaryKey = 'idadmin';
	public $timestamps = false;

	protected $fillable = [
		'nom',
		'mdp'
	];
}

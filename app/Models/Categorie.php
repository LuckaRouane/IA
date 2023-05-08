<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Categorie
 * 
 * @property int $idcategorie
 * @property string $nom
 * @property string|null $description
 *
 * @package App\Models
 */
class Categorie extends Model
{
	protected $table = 'categorie';
	protected $primaryKey = 'idcategorie';
	public $timestamps = false;

	protected $fillable = [
		'nom',
		'description'
	];
}

<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Article
 * 
 * @property int $idarticle
 * @property int $idcategorie
 * @property string $resume
 * @property string $contenu
 * @property string $visuel
 *
 * @package App\Models
 */
class Article extends Model
{
	protected $table = 'article';
	protected $primaryKey = 'idarticle';
	public $timestamps = false;

	protected $casts = [
		'idcategorie' => 'int'
	];

	protected $fillable = [
		'idcategorie',
		'resume',
		'contenu',
		'visuel'
	];
}

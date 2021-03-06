<?php

namespace App\Transformers;
class AdminTransformer extends  Transformer
{
	public function transform($item){
		return [
			'id'     => $item->id,
			'name'   => $item->name,
			"email"  => $item->email,
			"status" => $item->status,
			"inrole" => $item->role,
		];
	}

	public function roleName($roles){
		$inRoles=[];
		if(count($roles) > 0){
			foreach ($roles as $role) {
				$inRoles[]=$role['name'];
			}
		}
		return $inRoles;
	}

	public function single($item){
		return [
			'id'     => $item['id'],
			'name'   => $item['name'],
			"email"  => $item['email'],
			'status' =>	$item['status'],
			"inrole" => $this->roleName($item['roles'])
		];
	}
}
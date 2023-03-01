<?php



return [
		'akun' => 'Akun',
		'akunBackup' => 'Akun Backup',
		'akunBackupList' => 'Akun Backup List',
		'debet' => 'Debet',
		'id' => 'ID',
		'kodeTahun' => 'Kode Tahun',
		'kredit' => 'Kredit',
		'moduleTitle' => 'Akun Backup',
		't03-akun-backups' => 'Akun Backup',
		'validation' =>  [
			'debet' =>  [
				'decimal' => 'The {field} field must contain a decimal number.',
				'required' => 'The {field} field is required.',

			],

			'kode_tahun' =>  [
				'max_length' => 'The {field} field cannot exceed {param} characters in length.',
				'required' => 'The {field} field is required.',

			],

			'kredit' =>  [
				'decimal' => 'The {field} field must contain a decimal number.',
				'required' => 'The {field} field is required.',

			],

			'akun' =>  [
				'integer' => 'The {field} field must contain an integer.',
				'is_unique' => 'The {field} field must contain a unique value',
				'required' => 'The {field} field is required.',

			],


		],


];
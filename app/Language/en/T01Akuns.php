<?php



return [
		'akun' => 'Akun',
		'akunList' => 'Akun List',
		'bulanTahun' => 'Bulan Tahun',
		'debetIni' => 'Debet Ini',
		'debetLalu' => 'Debet Lalu',
		'grupAkun' => 'Grup Akun',
		'id' => 'ID',
		'kode' => 'Kode',
		'kreditIni' => 'Kredit Ini',
		'kreditLalu' => 'Kredit Lalu',
		'moduleTitle' => 'Akun',
		'nama' => 'Nama',
		't01-akuns' => 'Akun',
		'validation' =>  [
			'bulan_tahun' =>  [
				'max_length' => 'The {field} field cannot exceed {param} characters in length.',
				'required' => 'The {field} field is required.',

			],

			'debet_ini' =>  [
				'decimal' => 'The {field} field must contain a decimal number.',
				'required' => 'The {field} field is required.',

			],

			'debet_lalu' =>  [
				'decimal' => 'The {field} field must contain a decimal number.',
				'required' => 'The {field} field is required.',

			],

			'kode' =>  [
				'max_length' => 'The {field} field cannot exceed {param} characters in length.',
				'required' => 'The {field} field is required.',

			],

			'kredit_ini' =>  [
				'decimal' => 'The {field} field must contain a decimal number.',
				'required' => 'The {field} field is required.',

			],

			'kredit_lalu' =>  [
				'decimal' => 'The {field} field must contain a decimal number.',
				'required' => 'The {field} field is required.',

			],

			'nama' =>  [
				'max_length' => 'The {field} field cannot exceed {param} characters in length.',
				'required' => 'The {field} field is required.',

			],


		],


];
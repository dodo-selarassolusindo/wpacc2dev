<?php



return [
		'bulanTahun' => 'Bulan Tahun',
		'id' => 'ID',
		'jurnalLama' => 'Jurnal Lama',
		'jurnalLamaList' => 'Jurnal Lama List',
		'keterangan' => 'Keterangan',
		'moduleTitle' => 'Jurnal Lama',
		'nomor' => 'Nomor',
		't32-jurnal-lamas' => 'Jurnal Lama',
		'tanggal' => 'Tanggal',
		'validation' =>  [
			'bulan_tahun' =>  [
				'max_length' => 'The {field} field cannot exceed {param} characters in length.',

			],

			'keterangan' =>  [
				'max_length' => 'The {field} field cannot exceed {param} characters in length.',
				'required' => 'The {field} field is required.',

			],

			'nomor' =>  [
				'max_length' => 'The {field} field cannot exceed {param} characters in length.',
				'required' => 'The {field} field is required.',

			],

			'tanggal' =>  [
				'required' => 'The {field} field is required.',
				'valid_date' => 'The {field} field must contain a valid date.',

			],


		],


];
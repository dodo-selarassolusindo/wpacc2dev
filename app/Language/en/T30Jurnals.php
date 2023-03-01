<?php



return [
		'bulanTahun' => 'Bulan Tahun',
		'id' => 'ID',
		'jurnal' => 'Jurnal',
		'jurnalList' => 'Jurnal List',
		'keterangan' => 'Keterangan',
		'moduleTitle' => 'Jurnal',
		'nomor' => 'Nomor',
		't30-jurnals' => 'Jurnal',
		'tanggal' => 'Tanggal',
		'validation' =>  [
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
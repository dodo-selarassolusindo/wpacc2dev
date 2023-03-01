<?php



return [
		'bulanTahun' => 'Bulan Tahun',
		'id' => 'ID',
		'jurnalBackup' => 'Jurnal Backup',
		'jurnalBackupList' => 'Jurnal Backup List',
		'keterangan' => 'Keterangan',
		'moduleTitle' => 'Jurnal Backup',
		'nomor' => 'Nomor',
		't34-jurnal-backups' => 'Jurnal Backup',
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
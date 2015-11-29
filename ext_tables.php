<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	'Pi1',
	'Qinx Article'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Qinx Article');

$tmpQxArticleColumns = array(
	'tx_qxarticle_abstract' => array(
		'exclude' => 0,
		'label' => 'LLL:EXT:qxarticle/Resources/Private/Language/locallang_db.xlf:tx_qxarticle_domain_model_page.tx_qxarticle_abstract',
		'config' => array(
			'type' => 'text',
			'cols' => 40,
			'rows' => 15,
			'eval' => 'trim',
			'wizards' => array(
				'RTE' => array(
					'icon' => 'wizard_rte2.gif',
					'notNewRecords'=> 1,
					'RTEonly' => 1,
					'script' => 'wizard_rte.php',
					'title' => 'LLL:EXT:cms/locallang_ttc.xlf:bodytext.W.RTE',
					'type' => 'script'
				)
			)
		),
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('pages', $tmpQxArticleColumns);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCATypes('pages', ',--div--;LLL:EXT:qxarticle/Resources/Private/Language/locallang_db.xlf:tx_qxarticle_domain_model_page,tx_qxarticle_abstract');
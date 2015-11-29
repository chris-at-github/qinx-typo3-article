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

if (!isset($GLOBALS['TCA']['pages']['ctrl']['type'])) {
	if (file_exists($GLOBALS['TCA']['pages']['ctrl']['dynamicConfigFile'])) {
		require_once($GLOBALS['TCA']['pages']['ctrl']['dynamicConfigFile']);
	}
	// no type field defined, so we define it here. This will only happen the first time the extension is installed!!
	$GLOBALS['TCA']['pages']['ctrl']['type'] = 'tx_extbase_type';
	$tempColumns = array();
	$tempColumns[$GLOBALS['TCA']['pages']['ctrl']['type']] = array(
		'exclude' => 1,
		'label'   => 'LLL:EXT:qxarticle/Resources/Private/Language/locallang_db.xlf:tx_qxarticle.tx_extbase_type',
		'config' => array(
			'type' => 'select',
			'items' => array(),
			'size' => 1,
			'maxitems' => 1,
		)
	);
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('pages', $tempColumns, 1);
}

$tmp_qxarticle_columns = array(

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

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('pages',$tmp_qxarticle_columns);

$GLOBALS['TCA']['pages']['types']['Tx_Qxarticle_Page']['showitem'] = $TCA['pages']['types']['1']['showitem'];
$GLOBALS['TCA']['pages']['types']['Tx_Qxarticle_Page']['showitem'] .= ',--div--;LLL:EXT:qxarticle/Resources/Private/Language/locallang_db.xlf:tx_qxarticle_domain_model_page,';
$GLOBALS['TCA']['pages']['types']['Tx_Qxarticle_Page']['showitem'] .= 'tx_qxarticle_abstract';

$GLOBALS['TCA']['pages']['columns'][$TCA['pages']['ctrl']['type']]['config']['items'][] = array('LLL:EXT:qxarticle/Resources/Private/Language/locallang_db.xlf:pages.tx_extbase_type.Tx_Qxarticle_Page','Tx_Qxarticle_Page');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('pages', $GLOBALS['TCA']['pages']['ctrl']['type'],'','after:' . $TCA['pages']['ctrl']['label']);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::makeCategorizable(
    $_EXTKEY,
    'pages'
);

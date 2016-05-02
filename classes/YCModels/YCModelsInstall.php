<?php

$specs = [
    (object)[
        'ID' => YCModels::CBThemeIDForYCPageFooterViewContainer,
        'className' => 'CBTheme',
        'classNameForKind' => 'CBContainerView',
        'description' => 'This is the standard theme used by the CBContainerView inside the YCPageFooterView.',
        'title' => 'YCPageFooterView Container',
    ],
    (object)[
        'ID' => YCModels::CBThemeIDForYCPageFooterViewCopyright,
        'className' => 'CBTheme',
        'classNameForKind' => 'CBTextView',
        'description' => 'This is the standard theme used by the copyright CBTextView inside the YCPageFooterView.',
        'title' => 'YCPageFooterView Copyright',
    ],
];

$IDs = array_map(function ($spec) { return $spec->ID; }, $specs);
$models = CBModels::fetchModelsByID($IDs);

foreach ($specs as $spec) {
    if (empty($models[$spec->ID])) {
        CBModels::save([$spec]);
    }
}

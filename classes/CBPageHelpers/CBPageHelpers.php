<?php

final class CBPageHelpers {

    /**
     * @return [string]
     */
    static function classNamesForPageKinds() {
        return array_merge(
            CBPagesPreferences::classNamesForPageKindsDefault(),
            ['YCBlogPostPageKind']
        );
    }

    /**
     * @param stdClass $properties
     *
     * @return null
     */
    static function renderDefaultPageFooter(stdClass $properties) {
        CBView::renderModelAsHTML((object)[
            'className' => 'YCPageFooterView',
            'hideFlexboxFill' => true,
        ]);
    }

    /**
     * @param stdClass $properties
     *
     * @return null
     */
    static function renderDefaultPageHeader(stdClass $properties) {
        CBView::renderModelAsHTML((object)[
            'className' => 'YCPageHeaderView',
        ]);
    }
}

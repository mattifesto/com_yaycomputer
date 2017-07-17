<?php

final class CBPageHelpers {

    /**
     * @return string
     */
    static function classNameForUnsetPageSettings() {
        return 'YCPageSettingsForResponsivePages';
    }

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
     * @return [string]
     */
    static function classNamesForPageTemplates() {
        return array_merge(['YCBlogPostPageTemplate'], CBPagesPreferences::defaultClassNamesForPageTemplates);
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

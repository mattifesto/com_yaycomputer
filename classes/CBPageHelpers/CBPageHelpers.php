<?php

final class CBPageHelpers {

    /**
     * @param stdClass $properties
     *
     * @return null
     */
    static function renderDefaultPageFooter(stdClass $properties) {
        CBView::render(
            (object)[
                'className' => 'YCPageFooterView',
                'hideFlexboxFill' => true,
            ]
        );
    }


    /**
     * @param stdClass $properties
     *
     * @return null
     */
    static function renderDefaultPageHeader(stdClass $properties) {
        CBView::render(
            (object)[
                'className' => 'YCPageHeaderView',
            ]
        );
    }
}

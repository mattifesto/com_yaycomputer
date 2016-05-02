<?php

final class YCPageFooterView {

    /**
     * @return null
     */
    public static function renderModelAsHTML(stdClass $model) {
        echo '<div class="YCPageFooterViewFill" style="flex: 1 1 auto;"></div>';
        echo '<footer class="YCPageFooterView">';

        CBContainerView::renderModelAsHTML((object)[
            'subviews' => [
                (object)[
                    'className' => 'CBThemedTextView',
                    'center' => true,
                    'contentAsHTML' => 'Copyright &copy; 2016 - ' . gmdate('Y') . ' ' . CBSiteNameHTML,
                    'themeID' => YCModels::CBThemeIDForYCPageFooterViewCopyright,
                ],
            ],
            'themeID' => YCModels::CBThemeIDForYCPageFooterViewContainer,
        ]);

        echo '</footer>';
    }

    /**
     * @param stdClass $spec
     *
     * @return stdClass
     */
    public static function specToModel(stdClass $spec) {
        return (object)[
            'className' => __CLASS__,
        ];
    }
}

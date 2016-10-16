<?php

final class YCPageFooterView {

    /**
     * @param bool? $model->hideFlexboxFill
     *
     * @return null
     */
    public static function renderModelAsHTML(stdClass $model) {
        CBHTMLOutput::requireClassName(__CLASS__);

        if (empty(CBModel::value($model, 'hideFlexboxFill'))) {
            echo '<div class="YCPageFooterViewFill" style="flex: 1 1 auto;"></div>';
        }

        ?>

        <footer class="YCPageFooterView">
            <div class="copyright">
                Copyright &copy; 2016 - <?= gmdate('Y'), ' ', CBSiteNameHTML ?>
            </div>
        </footer>

        <?php
    }

    /**
     * @return [string]
     */
    public static function requiredCSSURLs() {
        return [Colby::flexnameForCSSForClass(CBSiteURL, __CLASS__)];
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

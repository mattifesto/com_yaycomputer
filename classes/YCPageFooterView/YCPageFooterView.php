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

        $sitePreferences = CBSitePreferences::model();

        ?>

        <footer class="YCPageFooterView">
            <div class="lists">
                <ul>
                    <?php

                    if (!empty($URL = $sitePreferences->facebookURL)) {
                        echo "<li><a href=\"{$URL}\">Facebook</a></li>";
                    }

                    if (!empty($URL = $sitePreferences->twitterURL)) {
                        echo "<li><a href=\"{$URL}\">Twitter</a></li>";
                    }

                    ?>
                </ul>
            </div>
            <div class="copyright">
                <p>Copyright &copy; 2016 - <?= gmdate('Y'), ' ', cbhtml(CBSitePreferences::siteName()) ?>
                <p>Website System Design &amp; Development by <a href="https://mattifesto.com/">Mattifesto Design</a>
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

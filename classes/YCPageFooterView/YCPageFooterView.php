<?php

final class YCPageFooterView {

    /* -- CBHTMLOutput interfaces -- -- -- -- -- */

    /**
     * @return [string]
     */
    static function CBHTMLOutput_CSSURLs(): array {
        return [
            Colby::flexpath(__CLASS__, 'css', cbsiteurl()),
        ];
    }


    /* -- CBInstall interfaces -- -- -- -- -- */

    /**
     * @return void
     */
    static function CBInstall_install(): void {
        CBViewCatalog::installView(
            __CLASS__
        );
    }
    /* CBInstall_install() */


    /**
     * @return [string]
     */
    static function CBInstall_requiredClassNames(): array {
        return [
            'CBViewCatalog',
        ];
    }
    /* CBInstall_requiredClassNames() */


    /* -- CBModel interfaces -- -- -- -- -- */

    /**
     * @param object $spec
     *
     * @return object
     */
    static function CBModel_build(stdClass $spec): stdClass {
        return (object)[];
    }


    /* -- CBView interfaces -- -- -- -- -- */

    /**
     * @param object $model
     *
     * @return void
     */
    static function CBView_render(stdClass $model): void {
        if (!CBModel::valueToBool($model, 'hideFlexboxFill')) {
            echo (
                '<div class="YCPageFooterViewFill" style="flex: 1 1 auto;">' .
                '</div>'
            );
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
                <p>
                    Copyright &copy; 2016 -
                    <?=
                        gmdate('Y') .
                        ' ' .
                        cbhtml(CBSitePreferences::siteName())
                    ?>
                <p>
                    Website System Design &amp; Development by
                    <a href="https://mattifesto.com/">Mattifesto Design</a>
            </div>
        </footer>

        <?php
    }
}

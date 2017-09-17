<?php

/**
 * @deprecated This class must install once and is then unneeded.
 */
final class YCModels {
    const CBThemeIDForYCPageFooterViewContainer = '861c057665be9a23f73a8380110e7fa2906ee075';
    const CBThemeIDForYCPageFooterViewCopyright = '058105fc195c69cd6c52fb1b878c908f38c5fc9f';

    /**
     * @return null
     */
    public static function install() {
        Colby::query('START TRANSACTION');

        try {
            CBModels::deleteByID([
                YCModels::CBThemeIDForYCPageFooterViewContainer,
                YCModels::CBThemeIDForYCPageFooterViewCopyright,
            ]);

            Colby::query('COMMIT');
        } catch (Exception $exception) {
            Colby::query('ROLLBACK');

            throw $exception;
        }
    }
}

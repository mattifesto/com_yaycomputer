"use strict";
/* jshint strict: global */
/* jshint esversion: 6 */
/* exported YCStandardPageLayoutEditor */
/* global
    CBUI,
    CBUIBooleanEditor,
*/



var YCStandardPageLayoutEditor = {

    /* -- CBUISpecEditor interfaces -- -- -- -- -- */



    /**
     * @param object args
     *
     *      {
     *          spec: object
     *          specChangedCallback: function
     *      }
     *
     * @return Element
     */
    CBUISpecEditor_createEditorElement(
        args
    ) {
        let spec = args.spec;
        let specChangedCallback = args.specChangedCallback;

        let elements = CBUI.createElementTree(
            "YCStandardPageLayoutEditor",
            "CBUI_sectionContainer",
            "CBUI_section"
        );

        let element = elements[0];
        let sectionElement = elements[2];

        sectionElement.appendChild(
            CBUIBooleanEditor.create(
                {
                    labelText: "Hide Page Title and Description View",
                    propertyName: "hidePageTitleAndDescriptionView",
                    spec: spec,
                    specChangedCallback: specChangedCallback,
                }
            ).element
        );

        return element;
    },
    /* CBUISpecEditor_createEditorElement() */

};

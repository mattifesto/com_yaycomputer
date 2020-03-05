"use strict";
/* jshint strict: global */
/* jshint esversion: 6 */
/* exported YCBlogPostPageLayoutEditor */
/* global
    CBModel,
    CBUI,
    CBUIBooleanEditor,
    CBUIStringEditor,
*/

var YCBlogPostPageLayoutEditor = {

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

        let elements, sectionElement;

        elements = CBUI.createElementTree(
            "YCBlogPostPageLayoutEditor",
            "CBUI_sectionContainer",
            "CBUI_section"
        );

        let element = elements[0];

        sectionElement = elements[2];

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

        sectionElement.appendChild(
            CBUIBooleanEditor.create(
                {
                    labelText: "Use Light Text Colors",
                    propertyName: "useLightTextColors",
                    spec: spec,
                    specChangedCallback: specChangedCallback,
                }
            ).element
        );


        sectionElement.appendChild(
            CBUIBooleanEditor.create(
                {
                    labelText: "Add Bottom Padding",
                    propertyName: "addBottomPadding",
                    spec: spec,
                    specChangedCallback: specChangedCallback,
                }
            ).element
        );

        /* local styles */

        elements = CBUI.createElementTree(
            "CBUI_sectionContainer",
            "CBUI_section"
        );

        element.appendChild(
            elements[0]
        );

        sectionElement = elements[1];


        /* styles template */
        {
            let templateEditor = CBUIStringEditor.create();
            templateEditor.title = "Styles Template";

            templateEditor.value = CBModel.valueToString(
                spec,
                "stylesTemplate"
            );

            templateEditor.changed = function () {
                spec.stylesTemplate = templateEditor.value;
                specChangedCallback();
            };

            sectionElement.appendChild(
                templateEditor.element
            );
        }
        /* styles template */


        return element;
    },
    /* CBUISpecEditor_createEditorElement() */

};

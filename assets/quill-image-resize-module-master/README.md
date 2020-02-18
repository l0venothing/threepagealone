# Quill ImageResize Module (Real resize)
<img src="https://image.noelshack.com/fichiers/2019/33/2/1565714805-fork.jpg"/>
A module for Quill rich text editor to allow images to be resized.

It's a fork of [quill-image-resize-module](https://github.com/kensnyder/quill-image-resize-module),
the "Crop" module resize the images with a canvas and produce lighter images. *That makes all the difference*!

### How does it work? 
With each modification, a canvas is generated at the right dimensions with the original image and generated a shorter data URL than if the image had kept excessive dimensions. Note that if the image is enlarged, the actual image will be at the base size.


## Usage


### Script Tag

Include my js file version

```html
<script src="/quill-image-resize-module/image-resize.min.js"></script>
```

### Config

You just have to include the submodule "Crop" in the module "imageResizes:

```javascript
const quill = new Quill(editor, {
    // ...
    modules: {
        // ...
        imageResize: {
            modules: [ 'Crop'/*, ... */ ]
        }
    }
});
```

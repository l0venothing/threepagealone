<script>

jQuery(document).ready(function()
{ 

  


    
    var toolbarOptions = [
       
  ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
  ['blockquote', 'code-block'],
  ['link', 'image'],
  [{ 'header': 1 }, { 'header': 2 }],               // custom button values
  [{ 'list': 'ordered'}, { 'list': 'bullet' }],
  [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
  [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
  [{ 'direction': 'rtl' }],                         // text direction

  // [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
  [{ 'header': [1, 2, 3, 4, 5, 6, false] }],

  [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
  [{ 'font': [] }],
  [{ 'align': [] }],

  // ['clean']                                         // remove formatting button
];

// var quill = new Quill('.editor', {
//   modules: {
//     toolbar: toolbarOptions
//   },
//   ImageResize: {
//             modules: [ 'Resize', 'DisplaySize', 'Toolbar' ]
//         },
//   theme: 'snow'
// });



//var quillContent = <?php echo $page->content_fr ?>;
var quill = new Quill('.editor_fr<?php  echo $page->id ?>', {
  modules: {
    toolbar: toolbarOptions,
  imageResize: {
            modules: [ 'Resize', 'DisplaySize', 'Toolbar' ]
        }
  },
  theme: 'snow'
});
//quill.setContents({'ops' : quillContent});

//var quillContentNL = <?php  echo $page->content_en ?>;
var quill_nl = new Quill('.editor_en<?php  echo $page->id ?>', {
  modules: {
    toolbar: toolbarOptions,
  imageResize: {
            modules: [ 'Resize', 'DisplaySize', 'Toolbar' ]
        }
  },
  theme: 'snow'
});
//quill_nl.setContents({'ops' : quillContentNL});
});
 

</script>


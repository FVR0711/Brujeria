<x-dynamic-component
:component="$getFieldWrapperView()"
:id="$getId()"
:label="$getLabel()"
:label-sr-only="$isLabelHidden()"
:helper-text="$getHelperText()"
:hint="$getHint()"
:hint-color="$getHintColor()"
:hint-icon="$getHintIcon()"
:required="$isRequired()"
:state-path="$getStatePath()"
wire:ignore
>

        <div x-data="{ state: $wire.$entangle('{{ $getStatePath() }}') }">
            <textarea id="editor" x-ref="editor" wire="state">{{ $getState() }}</textarea>
        </div>


        <!-- <textarea id="editor" x-model="state" x-on:input="state = $event.target.value" >{{$getState()}}</textarea> -->
        
 

    <link rel="stylesheet" href="/ckeditor/skins/moono/editor.css?t=G4CD">

    <!-- Incluir el archivo JavaScript de CKEditor -->
    <script src="/ckeditor/ckeditor.js"></script>

    <!-- Incluir el archivo de estilos adicionales para CKEditor -->
    <script src="/ckeditor/styles.js?t=G4CD"></script>

    <!-- Incluir el archivo de configuración de CKEditor -->
    <script src="/ckeditor/config.js?t=G4CD"></script>

    <!-- Incluir el archivo de traducción en español -->
    <script src="/ckeditor/lang/es.js?t=G4CD"></script>

    <!-- Incluir el archivo de configuración del skin (interfaz visual) -->
    <link rel="stylesheet" href="/ckeditor/skins/moono/editor.css?t=G4CD">

    <style>
        .cke_source{
            color:black;
        }

        #cke_1_top{
            background-color: hsla(0, 0%, 100%, .05);
        }
    </style>
    <script>


        CKEDITOR.replace('editor',{
                height: '500px',toolbarGroups: [
                    { name: 'document', groups: [ 'mode', 'document', 'doctools','save' ] },
                    { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
                    { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
                    { name: 'forms', groups: [ 'forms' ] },
                    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                    { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
                    { name: 'links', groups: [ 'links' ] },
                    { name: 'insert', groups: [ 'insert' ] },
                    { name: 'styles', groups: [ 'styles' ] },
                    { name: 'colors', groups: [ 'colors' ] },
                    { name: 'tools', groups: [ 'tools' ] },
                    { name: 'others', groups: [ 'others' ] },
                    { name: 'about', groups: [ 'about' ] }
                ],
               
                removeButtons : 'NewPage,Save,Print,Templates,Find,Scayt,Form,Checkbox,Radio,TextField,Textarea,Button,Select,ImageButton,HiddenField,Superscript,Subscript,CreateDiv,BidiLtr,BidiRtl,Language,Anchor,Flash,Smiley,SpecialChar,Iframe,ShowBlocks,About,Styles,HorizontalRule,Indent,Outdent,Strike,SelectAll'
        });

        
	
        CKEDITOR.on('instanceReady', function( ev ) {
            var blockTags = ['td','tr'];
            for (var i = 0; i < blockTags.length; i++)
            {
                ev.editor.dataProcessor.writer.setRules( blockTags[i], {
                    indent : false,
                    breakBeforeOpen : false,
                    breakAfterOpen : false,
                    breakBeforeClose : false,
                    breakAfterClose : false
                });
            }
        });

        CKEDITOR.instances['editor'].on('change', function() {
                let contenido = this.getData();
                
                @this.set('{{$getStatePath()}}', contenido);
                
            });

      

    </script>
</x-dynamic-component>
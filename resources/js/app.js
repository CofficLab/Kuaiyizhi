import './bootstrap';
import { Editor, EditorFactory } from '@coffic/juice-editor';

EditorFactory.register('juice-editor', {
  onCreate: (editor) => {
    console.log('editor created');
    editor.enableLog();
    editor.setReadOnly();
  },
});

import './bootstrap';
import { Editor, EditorFactory } from '@coffic/juice-editor';

EditorFactory.register('juice-editor', {
  onCreate: (editor) => {
    // editor.enableVerboseMode();
    editor.enableSlotListener();
    editor.disableLocalStorage();
    editor.setReadOnly();
  },
});

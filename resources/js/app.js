import './bootstrap';
import editor from '@coffic/juice-editor';

editor.onCreate(() => {
  console.log('editor created');
});

// Tiptap
import { Editor } from '@tiptap/core';
import StarterKit from '@tiptap/starter-kit';
import Placeholder from '@tiptap/extension-placeholder';
import Paragraph from '@tiptap/extension-paragraph';
import Bold from '@tiptap/extension-bold';
import Underline from '@tiptap/extension-underline';
import Link from '@tiptap/extension-link';
import BulletList from '@tiptap/extension-bullet-list';
import OrderedList from '@tiptap/extension-ordered-list';
import ListItem from '@tiptap/extension-list-item';
import Blockquote from '@tiptap/extension-blockquote';

const editor = new Editor({
  element: document.querySelector('#hs-editor-tiptap [data-hs-editor-field]'),
  extensions: [
    Placeholder.configure({
      placeholder: 'Add a message, if you\'d like.',
      emptyNodeClass: 'text-gray-800 dark:text-neutral-200'
    }),
    StarterKit,
    Paragraph.configure({
      HTMLAttributes: {
        class: 'text-gray-800 dark:text-neutral-200'
      }
    }),
    Bold.configure({
      HTMLAttributes: {
        class: 'font-bold'
      }
    }),
    Underline,
    Link.configure({
      HTMLAttributes: {
        class: 'inline-flex items-center gap-x-1 text-blue-600 decoration-2 hover:underline focus:outline-none focus:underline font-medium dark:text-white'
      }
    }),
    BulletList.configure({
      HTMLAttributes: {
        class: 'list-disc list-inside text-gray-800 dark:text-white'
      }
    }),
    OrderedList.configure({
      HTMLAttributes: {
        class: 'list-decimal list-inside text-gray-800 dark:text-white'
      }
    }),
    ListItem,
    Blockquote.configure({
      HTMLAttributes: {
        class: 'text-gray-800 sm:text-xl dark:text-white'
      }
    })
  ]
});
const actions = [
  {
    id: '#hs-editor-tiptap [data-hs-editor-bold]',
    fn: () => editor.chain().focus().toggleBold().run()
  },
  {
    id: '#hs-editor-tiptap [data-hs-editor-italic]',
    fn: () => editor.chain().focus().toggleItalic().run()
  },
  {
    id: '#hs-editor-tiptap [data-hs-editor-underline]',
    fn: () => editor.chain().focus().toggleUnderline().run()
  },
  {
    id: '#hs-editor-tiptap [data-hs-editor-strike]',
    fn: () => editor.chain().focus().toggleStrike().run()
  },
  {
    id: '#hs-editor-tiptap [data-hs-editor-link]',
    fn: () => {
      const url = window.prompt('URL');
      editor.chain().focus().extendMarkRange('link').setLink({ href: url }).run();
    }
  },
  {
    id: '#hs-editor-tiptap [data-hs-editor-ol]',
    fn: () => editor.chain().focus().toggleOrderedList().run()
  },
  {
    id: '#hs-editor-tiptap [data-hs-editor-ul]',
    fn: () => editor.chain().focus().toggleBulletList().run()
  },
  {
    id: '#hs-editor-tiptap [data-hs-editor-blockquote]',
    fn: () => editor.chain().focus().toggleBlockquote().run()
  },
  {
    id: '#hs-editor-tiptap [data-hs-editor-code]',
    fn: () => editor.chain().focus().toggleCode().run()
  }
];

actions.forEach(({ id, fn }) => {
  const action = document.querySelector(id);

  if (action === null) return;

  action.addEventListener('click', fn);
});
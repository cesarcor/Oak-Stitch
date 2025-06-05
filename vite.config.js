import { defineConfig } from 'vite';
import { fileURLToPath } from 'url';
import path from 'path';

const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);

export default defineConfig({
	root: '.',
	base: '/',
	build: {
		outDir: 'dist',
		emptyOutDir: true,
		rollupOptions: {
			input: {
				main: path.resolve(__dirname, 'assets/js/main.js'),
				styles: path.resolve(__dirname, 'assets/css/main.css'),
			},
			output: {
				entryFileNames: 'js/[name].js',
				assetFileNames: 'css/[name].css',
			},
		},
	},
	css: {
		postcss: './postcss.config.js',
	},
});

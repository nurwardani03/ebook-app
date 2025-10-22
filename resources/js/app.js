import './bootstrap';

import * as pdfjsLib from 'pdfjs-dist/build/pdf';
import pdfjsWorker from 'pdfjs-dist/build/pdf.worker?url';
pdfjsLib.GlobalWorkerOptions.workerSrc = pdfjsWorker;
window.pdfjsLib = pdfjsLib;

import Alpine from 'alpinejs'
window.Alpine = Alpine
Alpine.start()

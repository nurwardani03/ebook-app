<x-app-layout>
  <x-slot name="header">
    <div class="flex items-center justify-between">
      <h2 class="text-xl text-gray-800 font-semibold leading-tight">{{ __('Dashboard') }}</h2>
      <div class="text-xs text-gray-500">E-Book Manager</div>
    </div>
  </x-slot>

  <div class="max-w-7xl mx-auto p-4 lg:p-6">
    @if (session('status'))
      <div class="alert alert-success mb-4">{{ session('status') }}</div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
      <div class="lg:col-span-1">
        <div class="card bg-base-100 shadow border">
          <div class="card-body p-0">
            <div class="px-4 pt-4">
              <h3 class="font-medium text-base">Daftar eBook</h3>
            </div>
            <div class="divider my-2"></div>

            <div class="overflow-hidden">
              <div class="overflow-y-auto max-h-[65vh] pr-1">
                <table class="table">
                  <thead class="bg-base-200 sticky top-0 z-10">
                    <tr>
                      <th class="w-12 text-center">No</th>
                      <th>Nama eBook</th>
                      <th class="w-28 text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($ebooks as $i => $e)
                      <tr>
                        <td class="text-center">{{ $i+1 }}</td>
                        <td class="whitespace-normal break-words text-sm leading-snug">{{ $e->title }}</td>
                        <td>
                          <div class="flex items-center justify-center gap-2">
                            <a href="{{ route('dashboard', ['view'=>$e->id]) }}" aria-label="Lihat eBook" class="btn btn-xs btn-ghost btn-square">
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12s3.75-7.5 9.75-7.5S21.75 12 21.75 12s-3.75 7.5-9.75 7.5S2.25 12 2.25 12z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                              </svg>
                            </a>
                            <form action="{{ route('ebooks.destroy',$e) }}" method="POST" class="inline" onsubmit="return confirm('Yakin hapus ebook?')">
                              @csrf @method('DELETE')
                              <button class="btn btn-xs btn-square bg-red-500 hover:bg-red-600 text-white shadow-sm transition" aria-label="Hapus eBook">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                  <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2h12a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM5 6a1 1 0 011 1v9a2 2 0 002 2h4a2 2 0 002-2V7a1 1 0 112 0v9a4 4 0 01-4 4H8a4 4 0 01-4-4V7a1 1 0 011-1z" clip-rule="evenodd"/>
                                  <path d="M9 9a1 1 0 012 0v6a1 1 0 11-2 0V9z"/>
                                </svg>
                              </button>
                            </form>
                          </div>
                        </td>
                      </tr>
                    @empty
                      <tr><td colspan="3" class="text-center text-sm py-6">Belum ada data.</td></tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
            </div>

            <div class="px-4 py-3 text-xs text-gray-500 border-t">
              * Klik ikon Lihat untuk menampilkan PDF di panel kanan.
            </div>
          </div>
        </div>
      </div>

      <div class="lg:col-span-2">
        <div class="card bg-base-100 shadow border relative">
          <div class="card-body p-0">
            @if($current)
              <div id="pdfToolbar" class="flex items-center justify-between px-4 py-3 border-b bg-base-200/60">
                <div class="flex items-center gap-2">
                  <span class="font-medium">{{ $current->title }}</span>
                  <span class="badge badge-info">View Only</span>
                </div>
                <div class="text-xs opacity-70">Scroll ke bawah lebih detail</div>
              </div>
              <div id="pdfCanvasContainer" class="h-[78vh] overflow-y-auto overflow-x-hidden relative select-none bg-base-100" oncontextmenu="return false;"></div>
              <form id="autoLogoutForm" method="POST" action="{{ route('logout') }}" class="hidden">@csrf</form>
            @else
              <div class="p-10 text-center text-base-content/60">
                Pilih eBook di tabel untuk ditampilkan di sini.
              </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>

  @if($current)
    <dialog id="tabWarn" class="modal">
    <div class="modal-box text-center bg-white shadow-xl">
      <div class="mx-auto mb-3 flex h-12 w-12 items-center justify-center rounded-full bg-amber-100 text-amber-600">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.5M12 16h.01M12 3a9 9 0 110 18 9 9 0 010-18z"/>
        </svg>
      </div>

      <h3 class="text-lg font-semibold text-slate-800">Peringatan</h3>

      <p class="mt-2 text-sm text-slate-600">
        Anda telah berpindah tab. Soal ditutup untuk menjaga integritas pengerjaan.
      </p>
      <p id="chanceMsg" class="mt-1 text-xs font-medium text-amber-700">
        2 kali lagi berpindah tab akan menyebabkan sistem logout otomatis.
      </p>

      <div class="modal-action justify-center">
        <form method="dialog">
          <button class="btn btn-neutral text-gray-800 px-6">Saya Mengerti</button>
        </form>
      </div>
    </div>

  <form method="dialog" class="modal-backdrop bg-black/40">
    <button>close</button>
  </form>
</dialog>


    <script>
      (function () {
        const fileUrl = @json($current ? route('ebooks.stream', $current) : null);
        const viewerKey = 'ebook_tab_switch_{{ $current->id }}';
        const limit = 3;
        if (!fileUrl) return;

        const waitForPdfjs = (timeoutMs = 6000) => new Promise((resolve, reject) => {
          const t0 = Date.now();
          (function tick(){ if (window.pdfjsLib) return resolve(window.pdfjsLib); if (Date.now() - t0 > timeoutMs) return reject(new Error('PDF.js not loaded')); setTimeout(tick, 50); })();
        });

        function openWarn(left){
          const dlg = document.getElementById('tabWarn');
          const span = document.getElementById('chanceMsg');
          if (span) span.textContent = `${left} kali lagi berpindah tab akan otomatis logout`;
          if (dlg && typeof dlg.showModal === 'function') { try { dlg.showModal(); } catch(_){} }
        }

        waitForPdfjs().then(async (pdfjsLib) => {
          const container = document.getElementById('pdfCanvasContainer');
          if (!container) return;

          ['selectstart','dragstart','contextmenu','copy','cut'].forEach(evt =>
            container.addEventListener(evt, e => e.preventDefault(), { passive:false })
          );

          let count = parseInt(sessionStorage.getItem(viewerKey) || '0', 10);
          if (count >= limit) { document.getElementById('autoLogoutForm')?.submit(); return; }

          const loadingTask = pdfjsLib.getDocument({ url: fileUrl, withCredentials: true, disableRange: true, disableStream: true });
          const pdf = await loadingTask.promise;

          let lastWidth = 0, rendering = false, rerenderQueued = false, cancel = { value:false };

          async function renderAll() {
            if (rendering) { rerenderQueued = true; return; }
            rendering = true;
            cancel.value = false;

            const padX = parseFloat(getComputedStyle(container).paddingLeft) + parseFloat(getComputedStyle(container).paddingRight);
            const targetWidth = Math.floor(container.clientWidth - padX);
            if (targetWidth <= 0) { rendering = false; return; }

            container.querySelectorAll('canvas[data-pdf-page]').forEach(c => c.remove());

            const dpr = Math.min(window.devicePixelRatio || 1, 2);
            for (let i = 1; i <= pdf.numPages; i++) {
              if (cancel.value) break;
              const page = await pdf.getPage(i);
              const base = page.getViewport({ scale: 1 });
              const scale = targetWidth / base.width;
              const viewport = page.getViewport({ scale });

              const canvas = document.createElement('canvas');
              canvas.dataset.pdfPage = i;
              canvas.className = 'block mx-auto my-4 rounded-lg shadow-sm border border-base-200';
              const ctx = canvas.getContext('2d', { alpha: false });

              canvas.style.width  = viewport.width + 'px';
              canvas.style.height = viewport.height + 'px';
              canvas.width  = Math.floor(viewport.width * dpr);
              canvas.height = Math.floor(viewport.height * dpr);
              ctx.setTransform(dpr, 0, 0, dpr, 0, 0);

              await page.render({ canvasContext: ctx, viewport }).promise;
              container.appendChild(canvas);
            }

            lastWidth = targetWidth;
            rendering = false;
            if (rerenderQueued) { rerenderQueued = false; renderAll(); }
          }

          await renderAll();

          const ro = new ResizeObserver(() => {
            const padX = parseFloat(getComputedStyle(container).paddingLeft) + parseFloat(getComputedStyle(container).paddingRight);
            const w = Math.floor(container.clientWidth - padX);
            if (w !== lastWidth) { cancel.value = true; renderAll(); }
          });
          ro.observe(container);

          document.addEventListener('visibilitychange', () => {
            if (!document.hidden) {
              count = parseInt(sessionStorage.getItem(viewerKey) || '0', 10) + 1;
              sessionStorage.setItem(viewerKey, String(count));
              if (count >= limit) {
                sessionStorage.removeItem(viewerKey);
                document.getElementById('autoLogoutForm')?.submit();
                return;
              }
              container.querySelectorAll('canvas[data-pdf-page]').forEach(c => c.remove());
              openWarn(limit - count);
            }
          });
        }).catch(() => {
          alert('PDF engine belum termuat. Pastikan resources/js/app.js aktif.');
        });
      })();
    </script>

    <style>
      #pdfCanvasContainer { padding: 16px; }
      #pdfCanvasContainer, #pdfCanvasContainer * { -webkit-user-select: none !important; -moz-user-select: none !important; -ms-user-select: none !important; user-select: none !important; }
      #pdfCanvasContainer { overflow-x: hidden !important; overflow-y: auto !important; }
      #pdfCanvasContainer::before {
        content: "";
        position: absolute;
        inset: 0;
        pointer-events: none;
        opacity: .12;
        transform: rotate(-18deg);
        transform-origin: center;
        background-repeat: repeat;
        background-size: 360px 140px;
        background-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='360' height='140'><text x='0' y='48' font-size='24' font-family='Arial, Helvetica, sans-serif' fill='%23000000'>Nur Wardani</text></svg>");
        mix-blend-mode: multiply;
      }
    </style>
  @endif
</x-app-layout>

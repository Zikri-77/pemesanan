<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Profil Interaktif - Al Ridho Zikri</title>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <style>
    :root{
      --bg: #f3f6fb;
      --card: #ffffff;
      --muted: #6b7280;
      --accent: #0f766e;
      --glass: rgba(255,255,255,0.6);
      --shadow: 0 8px 24px rgba(13, 38, 59, 0.08);
    }
    [data-theme="dark"]{
      --bg: #0b1220;
      --card: #0f1724;
      --muted: #9ca3af;
      --accent: #06b6d4;
      --glass: rgba(255,255,255,0.03);
      --shadow: 0 12px 30px rgba(2,6,23,0.6);
    }

    *{box-sizing:border-box}
    body{
      margin:0;
      font-family:Inter,ui-sans-serif,system-ui,-apple-system,"Segoe UI",Roboto,"Helvetica Neue",Arial;
      background: linear-gradient(180deg,var(--bg), #e9f0fb 60%);
      min-height:100vh;
      display:flex;
      align-items:center;
      justify-content:center;
      padding:32px;
      transition:background .3s ease;
    }

    .container{
      width:100%;
      max-width:880px;
      display:grid;
      grid-template-columns: 360px 1fr;
      gap:24px;
    }

    .card{
      background: linear-gradient(180deg, var(--card), rgba(255,255,255,0.8));
      border-radius:16px;
      padding:22px;
      box-shadow:var(--shadow);
      backdrop-filter: blur(6px);
      border:1px solid rgba(0,0,0,0.04);
    }

    .profile-photo{
      width:120px;height:120px;border-radius:12px;overflow:hidden;
      display:flex;align-items:center;justify-content:center;font-weight:700;color:var(--card);
      background:linear-gradient(135deg,var(--accent), #7c3aed);
      font-size:20px;margin-bottom:12px;
    }

    h2{margin:0 0 6px 0}
    p.muted{color:var(--muted);margin:0 0 12px 0}

    .info-list{list-style:none;padding:0;margin:12px 0 0 0}
    .info-list li{display:flex;justify-content:space-between;padding:10px 12px;border-radius:8px;margin-bottom:8px;background:var(--glass)}
    .label{color:var(--muted);font-size:13px}
    .value{font-weight:600}

    .controls{display:flex;gap:8px;margin-top:12px}
    button{cursor:pointer;padding:8px 12px;border-radius:8px;border:0;background:var(--accent);color:white;font-weight:600}
    button.ghost{background:transparent;color:var(--accent);border:1px solid rgba(0,0,0,0.06)}
    button.small{padding:6px 10px;font-size:14px}

    /* right panel */
    .right{
      display:flex;flex-direction:column;gap:16px;
    }

    .card .title{display:flex;align-items:center;justify-content:space-between;margin-bottom:8px}

    .preview{
      padding:14px;border-radius:10px;border:1px dashed rgba(0,0,0,0.05);background:linear-gradient(180deg,transparent, rgba(255,255,255,0.02));min-height:140px;display:flex;flex-direction:column;gap:8px;justify-content:center
    }

    .actions{display:flex;gap:8px;flex-wrap:wrap}

    .toast{position:fixed;right:24px;bottom:24px;background:#111;color:#fff;padding:10px 14px;border-radius:10px;box-shadow:0 8px 20px rgba(0,0,0,0.2);opacity:0;transform:translateY(8px);transition:all .25s}
    .toast.show{opacity:1;transform:translateY(0)}

    /* modal */
    .modal-backdrop{position:fixed;inset:0;background:rgba(2,6,23,0.5);display:none;align-items:center;justify-content:center;padding:24px}
    .modal{width:100%;max-width:480px;background:var(--card);padding:18px;border-radius:12px;box-shadow:var(--shadow)}
    .modal header{display:flex;align-items:center;justify-content:space-between;margin-bottom:12px}
    .modal form{display:grid;gap:10px}
    .modal input, .modal textarea{padding:10px;border-radius:8px;border:1px solid rgba(0,0,0,0.06);background:transparent}

    /* responsive */
    @media (max-width:820px){
      .container{grid-template-columns:1fr;}
    }
  </style>
</head>
<body data-theme="light">
  <div class="container">
    <div class="card">
        <div class="profile-photo" id="photo">
        <img id="photo-img" src="cukurukuk.jpg" alt="Foto Profil" style="width:100%; height:100%; object-fit:cover; border-radius:12px;">
    </div>
      <h2 id="display-name">Al Ridho Zikri</h2>
      <p class="muted" id="display-role">Mahasiswa • Medan</p>

      <ul class="info-list">
        <li><span class="label">Umur</span><span class="value" id="display-umur">19</span></li>
        <li><span class="label">Alamat</span><span class="value" id="display-alamat">Medan</span></li>
        <li><span class="label">Status</span><span class="value" id="display-status">Mahasiswa</span></li>
        <li><span class="label">Hobi</span><span class="value" id="display-hobi">Main Roblox</span></li>
      </ul>

      <div class="controls">
        <button id="btnEdit">✏️ Edit</button>
        <button id="btnCopy" class="ghost small">📋 Copy</button>
        <button id="btnToast" class="ghost small">🔊 Preview Toast</button>
        <button id="btnTheme" class="ghost small">🌙 Toggle Theme</button>
      </div>
    </div>

    <div class="right">
      <div class="card">
        <div class="title"><strong>Pratinjau</strong><span class="muted">Interaksi realtime</span></div>
        <div class="preview" id="preview">
          <div><strong>Nama:</strong> <span id="pv-name">Al Ridho Zikri</span></div>
          <div><strong>Umur:</strong> <span id="pv-umur">19</span></div>
          <div><strong>Alamat:</strong> <span id="pv-alamat">Medan</span></div>
          <div><strong>Status:</strong> <span id="pv-status">Mahasiswa</span></div>
          <div><strong>Hobi:</strong> <span id="pv-hobi">Main Roblox</span></div>
        </div>

        <div style="margin-top:12px" class="actions">
          <button id="btnAlert">Tampilkan Alert</button>
          <button id="btnConsole" class="ghost small">Console Log</button>
        </div>
      </div>

      <div class="card">
        <div class="title"><strong>Petunjuk</strong><span class="muted">Klik tombol untuk interaksi</span></div>
        <ol style="margin:0 0 8px 16px;color:var(--muted)">
          <li>Klik <strong>Edit</strong> untuk mengubah data profil.</li>
          <li>Klik <strong>Copy</strong> untuk menyalin ringkasan ke clipboard.</li>
          <li><strong>Toggle Theme</strong> untuk berganti mode gelap/terang.</li>
        </ol>
      </div>
    </div>
  </div>

  <!-- modal -->
  <div id="modal" class="modal-backdrop" role="dialog" aria-modal="true">
    <div class="modal" role="document">
      <header>
        <strong>Edit Profil</strong>
        <button id="closeModal" class="ghost small">✖</button>
      </header>

      <form id="formEdit">
        <input id="inputName" placeholder="Nama" required />
        <input id="inputUmur" type="number" placeholder="Umur" min="0" required />
        <input id="inputAlamat" placeholder="Alamat" />
        <input id="inputStatus" placeholder="Status" />
        <input id="inputHobi" placeholder="Hobi" />
        <div style="display:flex;gap:8px;justify-content:flex-end;margin-top:8px">
          <button type="button" id="saveBtn">Simpan</button>
          <button type="button" id="cancelBtn" class="ghost">Batal</button>
        </div>
      </form>
    </div>
  </div>

  <div id="toast" class="toast">Tersalin ke clipboard</div>

  <script>
    // initial data (sama seperti PHP / console sebelumnya)
    const data = {
      nama: 'Al Ridho Zikri',
      umur: 19,
      alamat: 'Medan',
      status: 'Mahasiswa',
      hobi: "Main Roblox"
    };

    // refs
    const ids = ['name','umur','alamat','status','hobi'];
    function updateUI(){
      document.getElementById('display-name').textContent = data.nama;
      document.getElementById('display-role').textContent = `${data.status} • ${data.alamat}`;
      document.getElementById('display-umur').textContent = data.umur;
      document.getElementById('display-alamat').textContent = data.alamat;
      document.getElementById('display-status').textContent = data.status;
      document.getElementById('display-hobi').textContent = data.hobi;

      document.getElementById('pv-name').textContent = data.nama;
      document.getElementById('pv-umur').textContent = data.umur;
      document.getElementById('pv-alamat').textContent = data.alamat;
      document.getElementById('pv-status').textContent = data.status;
      document.getElementById('pv-hobi').textContent = data.hobi;

      // initials for photo
      const initials = data.nama.split(' ').map(s=>s[0]).slice(0,3).join('').toUpperCase();
      document.getElementById('photo').textContent = initials;
    }
    updateUI();

    // modal logic
    const modal = document.getElementById('modal');
    const btnEdit = document.getElementById('btnEdit');
    const closeModal = document.getElementById('closeModal');
    const cancelBtn = document.getElementById('cancelBtn');
    const saveBtn = document.getElementById('saveBtn');

    btnEdit.addEventListener('click', ()=>{
      document.getElementById('inputName').value = data.nama;
      document.getElementById('inputUmur').value = data.umur;
      document.getElementById('inputAlamat').value = data.alamat;
      document.getElementById('inputStatus').value = data.status;
      document.getElementById('inputHobi').value = data.hobi;
      modal.style.display = 'flex';
    });
    closeModal.addEventListener('click', ()=> modal.style.display='none');
    cancelBtn.addEventListener('click', ()=> modal.style.display='none');

    saveBtn.addEventListener('click', ()=>{
      // simple validation
      const newName = document.getElementById('inputName').value.trim();
      if(!newName) return alert('Nama harus diisi');
      data.nama = newName;
      data.umur = Number(document.getElementById('inputUmur').value) || data.umur;
      data.alamat = document.getElementById('inputAlamat').value.trim() || data.alamat;
      data.status = document.getElementById('inputStatus').value.trim() || data.status;
      data.hobi = document.getElementById('inputHobi').value.trim() || data.hobi;
      updateUI();
      modal.style.display = 'none';
      showToast('Profil diperbarui');
    });

    // copy to clipboard
    document.getElementById('btnCopy').addEventListener('click', async ()=>{
      const text = `Nama: ${data.nama}\nUmur: ${data.umur}\nAlamat: ${data.alamat}\nStatus: ${data.status}\nHobi: ${data.hobi}`;
      try{
        await navigator.clipboard.writeText(text);
        showToast('Tersalin ke clipboard');
      }catch(e){
        // fallback
        const ta = document.createElement('textarea'); ta.value = text; document.body.appendChild(ta); ta.select();
        try{ document.execCommand('copy'); showToast('Tersalin (fallback)'); }catch(e){ alert('Gagal menyalin'); }
        document.body.removeChild(ta);
      }
    });

    // toast
    const toast = document.getElementById('toast');
    let toastTimer = null;
    function showToast(msg='Tersimpan'){
      toast.textContent = msg;
      toast.classList.add('show');
      clearTimeout(toastTimer);
      toastTimer = setTimeout(()=>toast.classList.remove('show'), 2000);
    }

    
// Alert dengan SweetAlert + switch
document.getElementById('btnAlert').addEventListener('click', () => {
  let pilihan = prompt("Pilih jenis alert:\n1. Profil Lengkap\n2. Nama Saja\n3. Hobi");
  switch (pilihan) {
    case "1":
      Swal.fire({
        title: 'Profil Lengkap',
        html: `
          <b>Nama:</b> ${data.nama}<br>
          <b>Umur:</b> ${data.umur}<br>
          <b>Alamat:</b> ${data.alamat}<br>
          <b>Status:</b> ${data.status}<br>
          <b>Hobi:</b> ${data.hobi}
        `,
        icon: 'info'
      });
      break;

    case "2":
      Swal.fire({
        title: 'Nama',
        text: data.nama,
        icon: 'success'
      });
      break;

    case "3":
      Swal.fire({
        title: 'Hobi',
        text: data.hobi,
        icon: 'question'
      });
      break;

    default:
      Swal.fire({
        title: 'Error',
        text: 'Pilihan tidak valid!',
        icon: 'error'
      });
  }
});


    document.getElementById('btnConsole').addEventListener('click', ()=>{
      console.log('Profil:', data);
      showToast('Tercetak di console');
    });

    // theme toggle
    const btnTheme = document.getElementById('btnTheme');
    btnTheme.addEventListener('click', ()=>{
      const root = document.body;
      if(root.getAttribute('data-theme') === 'light') root.setAttribute('data-theme','dark');
      else root.setAttribute('data-theme','light');
    });

    // accessibility: close modal on backdrop click
    modal.addEventListener('click', (e)=>{ if(e.target === modal) modal.style.display='none'; });

    // keyboard shortcuts: e = edit, c = copy
    document.addEventListener('keydown', (e)=>{
      if(e.key === 'e') btnEdit.click();
      if(e.key === 'c') document.getElementById('btnCopy').click();
    });
  </script>
</body>
</html>
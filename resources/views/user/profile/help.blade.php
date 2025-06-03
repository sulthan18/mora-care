@extends('layouts.app')

@section('title', 'Bantuan dan Dukungan')

@section('content')
    <!-- Back + Title -->
    <div class="d-flex align-items-center mb-4">
        <a href="{{ route('profile') }}" class="text-decoration-none text-dark me-3">
            <i class="fa-solid fa-arrow-left fa-lg"></i>
        </a>
        <h5 class="mb-0 fw-bold">Bantuan dan Dukungan</h5>
    </div>

    <!-- Intro Message -->
    <div class="mb-4">
        <p class="text-muted">
            Jika Anda mengalami kendala atau membutuhkan bantuan, silakan baca FAQ di bawah ini atau hubungi kami secara
            langsung.
        </p>
    </div>

    <!-- Search FAQ -->
    <div class="mb-4">
        <input type="text" class="form-control" placeholder="Cari pertanyaan..." id="faqSearch">
    </div>

    <!-- FAQ Section -->
    <div class="accordion" id="faqAccordion">
        <!-- FAQ 1 -->
        <div class="accordion-item border rounded mb-3">
            <h2 class="accordion-header" id="faq1">
                <button class="accordion-button fw-semibold" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                    <i class="fa-solid fa-circle-question me-2 text-primary"></i> Bagaimana cara membuat laporan baru?
                </button>
            </h2>
            <div id="collapse1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                <div class="accordion-body text-muted">
                    Untuk membuat laporan baru, silakan buka menu <strong>Buat Laporan</strong>, pilih kategori laporan, isi
                    detail laporan dan unggah gambar jika perlu, kemudian kirim laporan Anda.
                </div>
            </div>
        </div>

        <!-- FAQ 2 -->
        <div class="accordion-item border rounded mb-3">
            <h2 class="accordion-header" id="faq2">
                <button class="accordion-button fw-semibold collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                    <i class="fa-solid fa-circle-question me-2 text-primary"></i> Bagaimana cara melihat status laporan
                    saya?
                </button>
            </h2>
            <div id="collapse2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body text-muted">
                    Anda dapat melihat status laporan Anda di menu <strong>My Report</strong>. Status laporan terbagi
                    menjadi <em>delivered</em>, <em>in process</em>, <em>completed</em>, dan <em>rejected</em>.
                </div>
            </div>
        </div>

        <!-- FAQ 3 -->
        <div class="accordion-item border rounded mb-3">
            <h2 class="accordion-header" id="faq3">
                <button class="accordion-button fw-semibold collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                    <i class="fa-solid fa-circle-question me-2 text-primary"></i> Apakah saya bisa mengedit laporan yang
                    sudah dikirim?
                </button>
            </h2>
            <div id="collapse3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body text-muted">
                    Saat ini, laporan yang sudah dikirim <strong>tidak bisa diedit</strong>. Jika ada perubahan penting,
                    silakan buat laporan baru atau hubungi tim dukungan.
                </div>
            </div>
        </div>

        <!-- FAQ 4 -->
        <div class="accordion-item border rounded mb-3">
            <h2 class="accordion-header" id="faq4">
                <button class="accordion-button fw-semibold collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                    <i class="fa-solid fa-circle-question me-2 text-primary"></i> Bagaimana jika saya lupa kode laporan
                    saya?
                </button>
            </h2>
            <div id="collapse4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body text-muted">
                    <span class="badge bg-primary">Kode Laporan</span> dikirim ke email Anda saat laporan dibuat. Jika lupa,
                    silakan cek email Anda atau hubungi tim dukungan untuk bantuan.
                </div>
            </div>
        </div>

        <!-- FAQ 5 -->
        <div class="accordion-item border rounded mb-3">
            <h2 class="accordion-header" id="faq5">
                <button class="accordion-button fw-semibold collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                    <i class="fa-solid fa-circle-question me-2 text-primary"></i> Bagaimana cara menghubungi tim dukungan?
                </button>
            </h2>
            <div id="collapse5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body text-muted">
                    Anda dapat menghubungi kami melalui email <a href="mailto:morasupport@gmail.com"
                        class="fw-semibold text-primary">morasupport@gmail.com</a> atau melalui formulir kontak di halaman
                    Bantuan.
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Section -->
    <div class="mt-5">
        <h6 class="fw-semibold">Masih butuh bantuan?</h6>
        <p class="text-muted mb-1">Silakan hubungi kami melalui:</p>
        <div class="d-flex align-items-center text-dark">
            <i class="fa-solid fa-envelope me-2 text-primary"></i>
            <a href="mailto:morasupport@gmail.com" class="text-decoration-none">morasupport@gmail.com</a>
        </div>
    </div>

    <!-- Feedback Section -->
    <!-- Feedback Section -->
    <div class="mt-5 text-center mb-5" style="margin-bottom: 100px;">
        <p class="text-muted">Apakah halaman ini membantu?</p>
        <div>
            <button id="thumbsUpBtn" class="btn btn-outline-success btn-sm me-2"><i
                    class="fa-solid fa-thumbs-up"></i></button>
            <button id="thumbsDownBtn" class="btn btn-outline-danger btn-sm"><i
                    class="fa-solid fa-thumbs-down"></i></button>
        </div>
    </div>

    <!-- Toast Notification -->
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 1055">
    <div id="feedbackToast" class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body" id="feedbackToastMessage"></div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>

@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // FAQ Search Filter
        document.getElementById('faqSearch').addEventListener('keyup', function() {
            const keyword = this.value.toLowerCase();
            const items = document.querySelectorAll('.accordion-item');

            items.forEach(item => {
                const text = item.innerText.toLowerCase();
                item.style.display = text.includes(keyword) ? '' : 'none';
            });
        });
    </script>
    <script>
    const toastElement = document.getElementById('feedbackToast');
    const toastMessage = document.getElementById('feedbackToastMessage');
    const toast = new bootstrap.Toast(toastElement);

    function showFakeToast(type) {
        if (type === 'up') {
            toastMessage.innerText = 'Terima kasih! Senang bisa membantu 😊';
            toastElement.classList.remove('bg-danger');
            toastElement.classList.add('bg-success');
        } else {
            toastMessage.innerText = 'Kami akan segera memperbaiki halaman ini. Terima kasih atas masukannya 🙏';
            toastElement.classList.remove('bg-success');
            toastElement.classList.add('bg-danger');
        }
        toast.show();
    }

    document.getElementById('thumbsUpBtn').addEventListener('click', function() {
        showFakeToast('up');
    });

    document.getElementById('thumbsDownBtn').addEventListener('click', function() {
        showFakeToast('down');
    });
</script>

@endsection

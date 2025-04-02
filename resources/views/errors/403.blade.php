<x-layouts.error>
<div class="container min-vh-100 d-flex flex-column justify-content-center">
    <div class="row">
        <div class="col-lg-8 mx-auto text-center">
            <div class="error-template p-5 rounded-4 shadow-sm bg-white">
                <h1 class="display-1 fw-bold text-danger mb-4">403</h1>
                <div class="error-details">
                    <h2 class="fs-3"><i class="bi bi-lock-fill text-warning"></i> Přístup odepřen</h2>
                    <p class="lead text-muted my-4">
                        Omlouváme se, ale nemáte potřebná oprávnění k přístupu na tuto stránku.
                    </p>
                </div>
                <div class="error-actions mt-4">
                    <a href="{{ url('/') }}" class="btn btn-primary btn-lg me-3">
                        <i class="bi bi-house-door"></i> Domovská stránka
                    </a>
                    <button onclick="history.back()" class="btn btn-outline-primary btn-lg me-3">
                        <i class="bi bi-arrow-left"></i> Zpět
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    body {
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
    }
    .error-template {
        border-top: 5px solid #dc3545;
    }
</style>
</x-layouts.error>
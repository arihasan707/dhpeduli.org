<div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
    <div>
        <h6 class="fw-semibold mb-0">{{ $title }}</h6>
        <span>{{ $program }}</span>
    </div>
    <ul class="d-flex align-items-center gap-2">
        <li class="fw-medium">
            <a href="{{route('admin.dashboard')}}" class="d-flex align-items-center gap-1 hover-text-primary">
                <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                Dashboard
            </a>
        </li>
        <li>- {{ $title }}</li>
    </ul>
</div>
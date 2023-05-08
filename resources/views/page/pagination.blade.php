@if ($paginator->hasPages())
    <div class="d-block d-md-flex align-items-center d-print-none">
        <nav class="d-flex ml-md-auto d-print-none" aria-label="Pagination">
            <ul class="pagination justify-content-end font-weight-semi-bold mb-0">
                {{ $paginator->links('pagination::bootstrap-4', ['items' => $paginator->total(), 'perPage' => $paginator->perPage() ]) }}
            </ul>
        </nav>
    </div> 
@endif
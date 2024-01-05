<!-- Modal -->
<div class="modal fade" id="exportModal" tabindex="-1" aria-labelledby="exportModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exportModalLabel">Export</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.export.history') }}" method="GET">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <label for="">Pilih Bulan</label>
                            <select name="month" class="form-control" required id="">
                                <option value="">-- Pilih Bulan --</option>
                                <option value="1">Januari</option>
                                <option value="2">Februari</option>
                                <option value="3">Maret</option>
                                <option value="4">April</option>
                                <option value="5">Mei</option>
                                <option value="6">Juni</option>
                                <option value="7">Juli</option>
                                <option value="8">Agustus</option>
                                <option value="9">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                        </div>
                        <div class="col-12 mt-3">
                            <label for="">Pilih Tahun</label>
                            @php
                                $year = date('Y');
                            @endphp
                            <select name="year" class="form-control" required id="">
                                <option value="">-- Pilih Tahun --</option>
                                @for ($i = 2023; $i <= $year; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        {{-- <div class="col-12 mt-3">
                            <label for="">Pilih Jenis File</label>
                            <select name="type" class="form-control" required id="">
                                <option value="">-- Pilih Jenis File --</option>
                                <option value="">PDF</option>
                                <option value="">Excel</option>
                            </select>
                        </div> --}}
                        <div class="col-12 mt-3">
                            <button class="btn btn-primary">Export</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

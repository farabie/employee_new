@foreach ($pegawai as $data)
    <div class="col-md-4 mb-4">
        <div class="card common-hover shadow-sm">
            <a href="{{ route('employee.detail', $data->nik) }}" class="text-decoration-none text-dark">
                <div class="d-flex align-items-center p-3">
                    @if (empty($data->foto))
                        @if ($data->jk == 'Laki-laki')
                            <img src="{{ asset('storage/assets/img/foto/no-foto-male.png') }}"
                                alt="Employee Image" class="img-90 b-r-8 me-3 uniform-img">
                        @elseif($data->jk == 'Perempuan')
                            <img src="{{ asset('storage/assets/img/foto/no-foto-female.png') }}"
                                alt="Employee Image" class="img-90 b-r-8 me-3 uniform-img">
                        @endif
                    @else
                        <img src="{{ asset("storage/assets/img/foto/$data->foto") }}"
                            alt="Employee Image" class="img-90 b-r-8 me-3 uniform-img">
                    @endif
                    <div class="card-body p-0">
                        <h6 class="pb-1 fw-bold text-truncate" style="max-width: 200px;"
                            title="{{ $data->nama }}">
                            {{ $data->nama }}
                        </h6>
                        <p class="pb-1 text-muted text-truncate small" style="max-width: 200px;"
                            title="{{ !empty($data->jabatan->posisi) ? $data->jabatan->posisi : '-' }}">
                            {{ !empty($data->jabatan->posisi) ? $data->jabatan->posisi : '-' }}
                        </p>
                        <p class="pb-1 text-muted text-truncate small" style="max-width: 200px;"
                            title="{{ !empty($data->email) ? $data->email : '-' }}">
                            {{ !empty($data->email) ? $data->email : '-' }}
                        </p>
                        <p class="pb-1 text-muted small">NIK: {{ $data->nik }}</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
@endforeach
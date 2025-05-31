<?php

namespace App\Models\shared;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\HtmlString;

class Medical extends Model
{
    use HasFactory;
    protected $table = 'tb_pengajuan_medical';
    protected $primaryKey = 'id ';
    
    public function getFormattedTglPengajuanAttribute()
    {
        return Carbon::parse($this->tgl_pengajuan)->locale('id')->translatedFormat('d F Y H:i:s');
    }

    public function getFormattedDateApprovalHrdAttribute()
    {
        return empty($this->date_approval_hrd) || $this->date_approval_hrd == '0000-00-00 00:00:00'
            ? '-'
            : Carbon::parse($this->date_approval_hrd)->locale('id')->translatedFormat('d F Y H:i:s');
    }

    public function getFormattedDateApprovalGmHrdAttribute()
    {
        return empty($this->date_approval_gm_hrd) || $this->date_approval_gm_hrd == '0000-00-00 00:00:00'
            ? '-'
            : Carbon::parse($this->date_approval_gm_hrd)->locale('id')->translatedFormat('d F Y H:i:s');
    }

    public function getFormattedDateApprovalFinanceVerifiedAttribute()
    {
        return empty($this->date_approval_finance_verified) || $this->date_approval_finance_verified == '0000-00-00 00:00:00'
            ? '-'
            : Carbon::parse($this->date_approval_finance_verified)->locale('id')->translatedFormat('d F Y H:i:s');
    }

    public function getFormattedDateApprovalTreasuryAttribute()
    {
        return empty($this->date_approval_treasury) || $this->date_approval_treasury == '0000-00-00 00:00:00'
            ? '-'
            : Carbon::parse($this->date_approval_treasury)->locale('id')->translatedFormat('d F Y H:i:s');
    }

    public function getStatusBadge($status)
    {
        return new HtmlString(match ($status) {
            'process' => '<span class="badge rounded-pill txt-info badge-b-info">Process</span>',
            'not_received', 'unverified', 'reject', 'unpaid' => '<span class="badge rounded-pill txt-danger badge-b-danger">' . ucfirst(str_replace('_', ' ', 'rejected')) . '</span>',
            'received', 'verified', 'approve', 'paid' => '<span class="badge rounded-pill txt-success badge-b-success">' . ucfirst('approved') . '</span>',
            '-' => '<span class="badge rounded-pill txt-info badge-b-info">Process</span>',
            default => '-',
        });
    }

    public function getJenisReimbusementText()
    {
        return match ($this->jenis_rembuisement) {
            'tunjangan_kesehatan' => 'Tunjangan Kesehatan',
            'kacamata' => 'Kacamata',
            'kehamilan' => 'Kehamilan',
            'pengobatan_gigi' => 'Pengobatan Gigi',
            'vaksinasi_anak' => 'Vaksinasi Anak',
            'medical_check_up' => 'Medical Check Up',
            default => '-',
        };
    }

}

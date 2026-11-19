<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembaruan Status Seleksi Oprec JBZ Kabupaten Purwakarta</title>
</head>
<body style="margin: 0; padding: 0; background-color: #FAF9F6; font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; color: #1C1C1A; line-height: 1.6;">

    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="background-color: #FAF9F6; padding: 30px 15px;">
        <tr>
            <td align="center">

                <!-- Main Email Card -->
                <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="max-width: 600px; background-color: #FFFFFF; border: 1px solid #E7E5E4; box-shadow: 0 1px 3px rgba(0,0,0,0.04);">
                    
                    <!-- Top Hairline 3-Color Brand Signature Bar -->
                    <tr>
                        <td style="padding: 0; height: 4px; line-height: 4px; font-size: 0;">
                            <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0">
                                <tr>
                                    <td width="33.33%" style="background-color: #20B0E8; height: 4px;"></td>
                                    <td width="33.33%" style="background-color: #F8D018; height: 4px;"></td>
                                    <td width="33.34%" style="background-color: #78B030; height: 4px;"></td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- Header Content -->
                    <tr>
                        <td style="padding: 32px 32px 24px 32px; border-bottom: 1px solid #F0EFEA;">
                            <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0">
                                <tr>
                                    <td>
                                        <p style="margin: 0 0 4px 0; font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 2px; color: #585850;">
                                            Jabar Bergerak Zillenial Purwakarta
                                        </p>
                                        <h1 style="margin: 0; font-size: 22px; font-weight: 700; color: #1C1C1A; line-height: 1.3;">
                                            Pemberitahuan Status Seleksi Oprec
                                        </h1>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- Body Content -->
                    <tr>
                        <td style="padding: 32px;">
                            <p style="margin: 0 0 16px 0; font-size: 15px; color: #1C1C1A;">
                                Yth. <strong>{{ $applicant->full_name }}</strong>,
                            </p>

                            <!-- Highlight Box: Applicant Summary -->
                            <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="background-color: #FAF9F6; border: 1px solid #E7E5E4; margin-bottom: 24px;">
                                <tr>
                                    <td style="padding: 18px 20px;">
                                        <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="font-size: 13px;">
                                            <tr>
                                                <td width="38%" style="padding: 3px 0; color: #585850; font-weight: 600;">Kode Registrasi</td>
                                                <td width="62%" style="padding: 3px 0; font-family: monospace; font-weight: 700; color: #1C1C1A;">: {{ $applicant->registration_code }}</td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 3px 0; color: #585850; font-weight: 600;">Asal Instansi</td>
                                                <td style="padding: 3px 0; color: #1C1C1A;">: {{ $applicant->institution }}</td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 3px 0; color: #585850; font-weight: 600;">Status Terkini</td>
                                                <td style="padding: 3px 0; font-weight: 700; color: {{ $applicant->status === 'Diterima' ? '#78B030' : ($applicant->status === 'Seleksi Wawancara' ? '#20B0E8' : ($applicant->status === 'Belum Lolos' ? '#DC2626' : '#585850')) }};">
                                                    : {{ $applicant->status }}
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>

                            <!-- Conditional Content per Status -->
                            @if($applicant->status === 'Seleksi Wawancara')
                                <div style="border-left: 4px solid #20B0E8; padding-left: 16px; margin-bottom: 24px;">
                                    <h2 style="margin: 0 0 8px 0; font-size: 16px; font-weight: 700; color: #1C1C1A;">
                                        Selamat! Kamu Lolos ke Tahap Wawancara
                                    </h2>
                                    <p style="margin: 0; font-size: 14px; color: #585850; line-height: 1.6;">
                                        Berdasarkan hasil kurasi dan verifikasi berkas administrasi, kamu dinyatakan memenuhi kualifikasi untuk melanjutkan ke tahap <strong>Seleksi Wawancara</strong> JBZ Kabupaten Purwakarta.
                                    </p>
                                </div>

                                <div style="background-color: #FAF9F6; border: 1px solid #E7E5E4; padding: 20px; margin-bottom: 24px; font-size: 13px; color: #585850; line-height: 1.6;">
                                    <p style="margin: 0 0 10px 0; font-weight: 700; color: #1C1C1A; text-transform: uppercase; letter-spacing: 0.5px;">
                                        Instruksi Wawancara:
                                    </p>
                                    <p style="margin: 0 0 12px 0;">
                                        Untuk mendapatkan informasi jadwal, sesi wawancara, dan teknis pelaksanaan, kamu diwajibkan segera bergabung ke dalam grup WhatsApp resmi calon peserta seleksi melalui tautan berikut:
                                    </p>

                                    @if(config('services.jbz.wa_interview_group'))
                                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" style="margin: 16px auto;">
                                            <tr>
                                                <td align="center" style="background-color: #F0A840;">
                                                    <a href="{{ config('services.jbz.wa_interview_group') }}" target="_blank" style="display: inline-block; padding: 14px 28px; font-size: 12px; font-weight: 700; text-transform: uppercase; letter-spacing: 1.5px; color: #FFFFFF; text-decoration: none;">
                                                        Gabung Grup WhatsApp Seleksi Wawancara
                                                    </a>
                                                </td>
                                            </tr>
                                        </table>
                                        <p style="margin: 0; font-size: 11px; color: #78716C; text-align: center;">
                                            Tautan langsung: <a href="{{ config('services.jbz.wa_interview_group') }}" style="color: #20B0E8; word-break: break-all;">{{ config('services.jbz.wa_interview_group') }}</a>
                                        </p>
                                    @else
                                        <p style="margin: 0; font-weight: 600; color: #1C1C1A;">
                                            Panitia akan segera menghubungi kamu melalui kontak WhatsApp yang terdaftar untuk jadwal sesi wawancara.
                                        </p>
                                    @endif
                                </div>

                            @elseif($applicant->status === 'Diterima')
                                <div style="border-left: 4px solid #78B030; padding-left: 16px; margin-bottom: 24px;">
                                    <h2 style="margin: 0 0 8px 0; font-size: 16px; font-weight: 700; color: #1C1C1A;">
                                        Selamat! Kamu Resmi Menjadi Bagian dari JBZ Kabupaten Purwakarta
                                    </h2>
                                    <p style="margin: 0; font-size: 14px; color: #585850; line-height: 1.6;">
                                        Dengan penuh rasa bangga, kami mengucapkan selamat atas keberhasilan kamu melewati seluruh rangkaian seleksi. Kamu dinyatakan <strong>RESMI DITERIMA</strong> sebagai bagian dari keluarga besar Jabar Bergerak Zillenial Kabupaten Purwakarta.
                                    </p>
                                </div>

                                <div style="background-color: #FAF9F6; border: 1px solid #E7E5E4; padding: 20px; margin-bottom: 24px; font-size: 13px; color: #585850; line-height: 1.6;">
                                    <p style="margin: 0 0 10px 0; font-weight: 700; color: #1C1C1A; text-transform: uppercase; letter-spacing: 0.5px;">
                                        Langkah Selanjutnya:
                                    </p>
                                    <p style="margin: 0 0 12px 0;">
                                        Silakan bergabung ke dalam grup WhatsApp resmi paguyuban anggota JBZ Purwakarta untuk proses orientasi, koordinasi bidang, dan pengenalan kabinet:
                                    </p>

                                    @if(config('services.jbz.wa_member_group'))
                                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" style="margin: 16px auto;">
                                            <tr>
                                                <td align="center" style="background-color: #1C1C1A;">
                                                    <a href="{{ config('services.jbz.wa_member_group') }}" target="_blank" style="display: inline-block; padding: 14px 28px; font-size: 12px; font-weight: 700; text-transform: uppercase; letter-spacing: 1.5px; color: #FFFFFF; text-decoration: none;">
                                                        Gabung Grup WhatsApp Resmi Anggota JBZ
                                                    </a>
                                                </td>
                                            </tr>
                                        </table>
                                        <p style="margin: 0; font-size: 11px; color: #78716C; text-align: center;">
                                            Tautan langsung: <a href="{{ config('services.jbz.wa_member_group') }}" style="color: #20B0E8; word-break: break-all;">{{ config('services.jbz.wa_member_group') }}</a>
                                        </p>
                                    @else
                                        <p style="margin: 0; font-weight: 600; color: #1C1C1A;">
                                            Koordinator bidang kamu akan segera menghubungi melalui WhatsApp untuk penyambutan dan onboarding resmi.
                                        </p>
                                    @endif
                                </div>

                            @elseif($applicant->status === 'Belum Lolos')
                                <div style="border-left: 4px solid #78716C; padding-left: 16px; margin-bottom: 24px;">
                                    <h2 style="margin: 0 0 8px 0; font-size: 16px; font-weight: 700; color: #1C1C1A;">
                                        Terima Kasih atas Antusiasme dan Partisipasi Kamu
                                    </h2>
                                    <p style="margin: 0 0 14px 0; font-size: 14px; color: #585850; line-height: 1.6;">
                                        Kami menyampaikan rasa hormat dan apresiasi yang setinggi-tingginya atas kesungguhan, waktu, dan gagasan yang telah kamu bagikan dalam proses Open Recruitment Jabar Bergerak Zillenial Kabupaten Purwakarta.
                                    </p>
                                    <p style="margin: 0 0 14px 0; font-size: 14px; color: #585850; line-height: 1.6;">
                                        Setelah mempertimbangkan alokasi formasi dan kebutuhan bidang secara saksama, saat ini kami belum dapat menyambut kamu ke tahapan kepengurusan periode ini. Keputusan ini tidak mengurangi nilai potensi dan kepedulian sosial yang kamu miliki.
                                    </p>
                                    <p style="margin: 0; font-size: 14px; color: #585850; line-height: 1.6;">
                                        Ruang berkontribusi untuk kemajuan masyarakat Purwakarta selalu terbuka lebar. Kami sangat menantikan kehadiranmu dalam berbagai program publik, aksi kemanusiaan, serta ruang kolaborasi JBZ Purwakarta selanjutnya.
                                    </p>
                                </div>

                            @else
                                <div style="border-left: 4px solid #F0A840; padding-left: 16px; margin-bottom: 24px;">
                                    <h2 style="margin: 0 0 8px 0; font-size: 16px; font-weight: 700; color: #1C1C1A;">
                                        Pembaruan Status: {{ $applicant->status }}
                                    </h2>
                                    <p style="margin: 0; font-size: 14px; color: #585850; line-height: 1.6;">
                                        Status berkas pendaftaran kamu saat ini telah diperbarui menjadi <strong>{{ $applicant->status }}</strong>. Kamu dapat memantau perkembangan seleksi secara berkala pada website resmi kami.
                                    </p>
                                </div>
                            @endif

                            <p style="margin: 24px 0 0 0; font-size: 13px; color: #585850; line-height: 1.6;">
                                Salam hangat,<br>
                                <strong>Badan Pengurus Harian & Panitia Oprec</strong><br>
                                Jabar Bergerak Zillenial Kabupaten Purwakarta
                            </p>
                        </td>
                    </tr>

                    <!-- Footer Content -->
                    <tr>
                        <td style="padding: 24px 32px; background-color: #FAF9F6; border-top: 1px solid #E7E5E4; font-size: 11px; color: #78716C; text-align: center;">
                            <p style="margin: 0 0 4px 0; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; color: #1C1C1A;">
                                Jabar Bergerak Zillenial Kabupaten Purwakarta
                            </p>
                            <p style="margin: 0 0 8px 0;">
                                Aktif, Adaptif, dan Kolaboratif &mdash; Semboyan: Kami Muda Siap Aksi
                            </p>
                            <p style="margin: 0; font-size: 10px; color: #A8A29E;">
                                Pesan ini dikirimkan otomatis oleh sistem pendaftaran resmi JBZ Purwakarta. Harap tidak membalas email ini secara langsung.
                            </p>
                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>
</html>

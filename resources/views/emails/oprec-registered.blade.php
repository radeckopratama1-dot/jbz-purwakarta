<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bukti Pendaftaran Oprec JBZ Kabupaten Purwakarta</title>
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
                                            Bukti Pendaftaran Open Recruitment
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
                                Halo, <strong>{{ $applicant->full_name }}</strong>.
                            </p>
                            <p style="margin: 0 0 24px 0; font-size: 14px; color: #585850; line-height: 1.6;">
                                Terima kasih atas antusiasme dan komitmen kamu untuk bergabung bersama Jabar Bergerak Zillenial (JBZ) Kabupaten Purwakarta. Berkas pendaftaran kamu telah berhasil kami terima di pangkalan data resmi.
                            </p>

                            <!-- Highlight Box: Registration Details -->
                            <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="background-color: #FAF9F6; border: 1px solid #E7E5E4; border-left: 4px solid #F0A840; margin-bottom: 24px;">
                                <tr>
                                    <td style="padding: 20px;">
                                        <p style="margin: 0 0 4px 0; font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 1.5px; color: #585850;">
                                            Kode Registrasi
                                        </p>
                                        <p style="margin: 0 0 16px 0; font-family: monospace; font-size: 22px; font-weight: 700; color: #1C1C1A; letter-spacing: 1px;">
                                            {{ $applicant->registration_code }}
                                        </p>

                                        <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="font-size: 13px;">
                                            <tr>
                                                <td width="38%" style="padding: 4px 0; color: #585850; font-weight: 600;">Asal Instansi</td>
                                                <td width="62%" style="padding: 4px 0; color: #1C1C1A;">: {{ $applicant->institution }}</td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 4px 0; color: #585850; font-weight: 600;">Pilihan Bidang 1</td>
                                                <td style="padding: 4px 0; color: #1C1C1A;">: {{ $applicant->firstChoiceDivision->name ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 4px 0; color: #585850; font-weight: 600;">Pilihan Bidang 2</td>
                                                <td style="padding: 4px 0; color: #1C1C1A;">: {{ $applicant->secondChoiceDivision->name ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 4px 0; color: #585850; font-weight: 600;">Status Terkini</td>
                                                <td style="padding: 4px 0; color: #78B030; font-weight: 700;">: {{ $applicant->status }}</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>

                            <!-- Instructions -->
                            <div style="font-size: 13px; color: #585850; line-height: 1.6; margin-bottom: 28px;">
                                <p style="margin: 0 0 10px 0; font-weight: 700; color: #1C1C1A; text-transform: uppercase; letter-spacing: 0.5px;">
                                    Langkah Selanjutnya:
                                </p>
                                <ol style="margin: 0; padding-left: 20px;">
                                    <li style="margin-bottom: 6px;">Simpan dan catat <strong>Kode Registrasi</strong> di atas untuk keperluan konfirmasi dan pengecekan seleksi berkala.</li>
                                    <li style="margin-bottom: 6px;">Panitia seleksi JBZ Kabupaten Purwakarta sedang melakukan verifikasi dan kurasi administrasi terhadap berkas yang telah dikirimkan.</li>
                                    <li>Pengumuman kelolosan ke tahap wawancara akan kami sampaikan kembali melalui email dan dapat dipantau langsung pada website resmi.</li>
                                </ol>
                            </div>

                            <!-- Action Button -->
                            <table role="presentation" cellspacing="0" cellpadding="0" border="0" style="margin: 0 auto 16px auto;">
                                <tr>
                                    <td align="center" style="background-color: #1C1C1A;">
                                        <a href="{{ url('/#oprec') }}" target="_blank" style="display: inline-block; padding: 14px 28px; font-size: 12px; font-weight: 700; text-transform: uppercase; letter-spacing: 1.5px; color: #FFFFFF; text-decoration: none;">
                                            Cek Status Pendaftaran di Website
                                        </a>
                                    </td>
                                </tr>
                            </table>

                            <p style="margin: 0; font-size: 12px; color: #78716C; text-align: center;">
                                Jika tautan di atas tidak dapat diklik, silakan akses: <span style="color: #1C1C1A; font-family: monospace;">{{ url('/#oprec') }}</span>
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

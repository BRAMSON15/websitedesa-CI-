# Template Customization Guide

## 📁 Template Files Location
Your Microsoft Word template files are located in: `app/foldertemplate/`

### Available Template Files:
1. `SURAT KET DOMISILI.docx` → Surat Keterangan Domisili
2. `SURAT KETERANGAN NIKAH.docx` → Surat Keterangan Nikah  
3. `suratketerangan blm menikah.odt` → Surat Keterangan Belum Nikah
4. `surat ket3rangan tidak mampu.docx` → Surat Keterangan Tidak Mampu
5. `SURAT KETERANGAN KEPEMILIKAN TANAH.docx` → Surat Keterangan Kepemilikan Tanah
6. `SURAT IZIN KERAMAIAN.docx` → Surat Izin Keramaian
7. `surat keterangan Usaha 2025.docx` → Surat Keterangan Usaha
8. `SurSurat keterangan - Copy.docx` → Surat Keterangan Jual Tanah

## 🔧 How to Customize Templates

### Method 1: Using Template Management Interface
1. **Access Template Manager**: Go to `/template` in admin panel
2. **View Templates**: See all available templates with their Word file references
3. **Preview Templates**: Click "Preview" to see how the template looks with sample data
4. **Edit Templates**: Click "Edit Template" to modify content

### Method 2: Direct Configuration File Edit
Edit the file: `app/Config/SuratTemplates.php`

```php
'Surat Keterangan Domisili' => [
    'title' => 'SURAT KETERANGAN DOMISILI',
    'content' => 'Your custom content here with {{PLACEHOLDERS}}',
    'required_fields' => ['tanggal_domisili'],
    'template_file' => 'SURAT KET DOMISILI.docx'
]
```

## 📝 Available Placeholders

### Basic Information (Available in all templates):
- `{{NAMA}}` - Applicant's full name
- `{{NIK}}` - National ID number
- `{{JENIS_KELAMIN}}` - Gender
- `{{AGAMA}}` - Religion
- `{{PEKERJAAN}}` - Occupation
- `{{STATUS_PERKAWINAN}}` - Marital status
- `{{ALAMAT}}` - Address
- `{{KEPERLUAN}}` - Purpose of the letter

### Letter-Specific Placeholders:

#### Surat Keterangan Domisili:
- `{{TANGGAL_DOMISILI}}` - Date started living at address

#### Surat Keterangan Nikah:
- `{{NAMA_PASANGAN}}` - Partner's name
- `{{TANGGAL_NIKAH}}` - Wedding date

#### Surat Keterangan Tidak Mampu:
- `{{PENGHASILAN}}` - Monthly income

#### Surat Keterangan Kepemilikan Tanah:
- `{{LOKASI_TANAH}}` - Land location
- `{{LUAS_TANAH}}` - Land area (m²)
- `{{BUKTI_KEPEMILIKAN}}` - Ownership proof

#### Surat Izin Keramaian:
- `{{JENIS_ACARA}}` - Event type
- `{{TANGGAL_ACARA}}` - Event date
- `{{LOKASI_ACARA}}` - Event location
- `{{JUMLAH_UNDANGAN}}` - Number of guests

#### Surat Keterangan Usaha:
- `{{JENIS_USAHA}}` - Business type
- `{{ALAMAT_USAHA}}` - Business address
- `{{TANGGAL_MULAI_USAHA}}` - Business start date

#### Surat Keterangan Jual Tanah:
- `{{LOKASI_TANAH}}` - Land location
- `{{LUAS_TANAH}}` - Land area (m²)
- `{{NAMA_PEMBELI}}` - Buyer's name

## 🎯 Step-by-Step Customization Process

### Step 1: Extract Content from Word Files
Since the system cannot directly read Word files, you need to:
1. Open each Word file in `app/foldertemplate/`
2. Copy the main content text (excluding header and signature)
3. Replace variable parts with placeholders (e.g., replace actual names with `{{NAMA}}`)

### Step 2: Update Template Configuration
1. Edit `app/Config/SuratTemplates.php`
2. Update the `content` field for each template
3. Ensure placeholders match the available data fields

### Step 3: Test Templates
1. Go to admin panel → Template Surat
2. Click "Preview" for each template
3. Verify the content displays correctly with sample data
4. Test PDF generation with actual applications

## 📋 Example Template Customization

### Before (Generic):
```php
'content' => 'Adalah benar-benar penduduk dan berdomisili di {{ALAMAT}} sejak {{TANGGAL_DOMISILI}}. Surat keterangan ini dibuat untuk keperluan {{KEPERLUAN}}.'
```

### After (Based on Word Document):
```php
'content' => 'Adalah benar-benar penduduk Desa Tifu yang berdomisili di {{ALAMAT}} sejak {{TANGGAL_DOMISILI}}. Yang bersangkutan adalah warga yang baik dan tidak pernah terlibat dalam kegiatan yang dapat mengganggu keamanan dan ketertiban masyarakat.

Surat keterangan domisili ini dibuat atas permintaan yang bersangkutan untuk keperluan {{KEPERLUAN}} dan dapat dipergunakan sebagaimana mestinya.'
```

## 🔄 Template Update Workflow

1. **Analyze Word Document**: Open the Word file and identify the structure
2. **Identify Variables**: Mark parts that should be filled with applicant data
3. **Create Placeholders**: Replace variables with `{{PLACEHOLDER_NAME}}`
4. **Update Configuration**: Modify the template in `SuratTemplates.php`
5. **Test Preview**: Use the template preview feature
6. **Test PDF Generation**: Create a test application and generate PDF
7. **Refine**: Adjust formatting and content as needed

## 🚀 Quick Start

To quickly update a template based on your Word document:

1. **Access**: Go to `/template` in admin panel
2. **Select**: Choose the template you want to customize
3. **Preview**: Click "Preview" to see current format
4. **Reference**: Open the corresponding Word file from `foldertemplate/`
5. **Copy Content**: Extract the main text from Word document
6. **Replace Variables**: Convert specific data to placeholders
7. **Update**: Modify `app/Config/SuratTemplates.php`
8. **Test**: Preview again to verify changes

## 📞 Need Help?

If you need assistance with template customization:
1. Share the content of specific Word documents
2. Specify which parts should be dynamic (filled with applicant data)
3. Indicate any special formatting requirements

The system is designed to be flexible and can accommodate various template formats based on your official Word documents.
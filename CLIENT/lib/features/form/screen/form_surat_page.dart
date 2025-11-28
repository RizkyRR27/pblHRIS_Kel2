import 'package:flutter/material.dart';
import 'package:intl/intl.dart';
import '../../../services/api_service.dart';

class FormSuratPage extends StatefulWidget {
  final String jenisSurat;
  const FormSuratPage({required this.jenisSurat, super.key});

  @override
  State<FormSuratPage> createState() => _FormSuratPageState();
}

class _FormSuratPageState extends State<FormSuratPage> {
  final TextEditingController namaC = TextEditingController();
  DateTime? tgl;
  bool loading = false;

  Future<void> submit() async {
    if (namaC.text.isEmpty || tgl == null) {
      ScaffoldMessenger.of(context)
          .showSnackBar(const SnackBar(content: Text("Lengkapi semua data")));
      return;
    }

    setState(() => loading = true);

    final data = {
      "nama": namaC.text,
      "jenis_surat": widget.jenisSurat,
      "tanggal": DateFormat("yyyy-MM-dd").format(tgl!),
    };

    final ok = await ApiService.createSurat(data);

    setState(() => loading = false);

    ScaffoldMessenger.of(context).showSnackBar(
      SnackBar(content: Text(ok ? "Pengajuan berhasil" : "Gagal mengajukan")),
    );

    if (ok) Navigator.of(context).pop();
  }

  @override
  void dispose() {
    namaC.dispose();
    super.dispose();
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: Colors.blue.shade50,

      appBar: AppBar(
        title: Text(
          "Surat ${widget.jenisSurat}",
          style: const TextStyle(
            fontWeight: FontWeight.bold,
          ),
        ),
        centerTitle: true,
        elevation: 0,
        backgroundColor: Colors.blue.shade600,
      ),

      body: Padding(
        padding: const EdgeInsets.all(20),
        child: Column(
          children: [
            // NAMA
            TextField(
              controller: namaC,
              decoration: InputDecoration(
                labelText: "Nama",
                labelStyle: TextStyle(color: Colors.blue.shade700),
                filled: true,
                fillColor: Colors.white,
                border: OutlineInputBorder(
                  borderRadius: BorderRadius.circular(12),
                ),
                focusedBorder: OutlineInputBorder(
                  borderRadius: BorderRadius.circular(12),
                  borderSide: BorderSide(color: Colors.blue.shade700, width: 2),
                ),
              ),
            ),

            const SizedBox(height: 20),

            // TANGGAL
            GestureDetector(
              onTap: () async {
                final pick = await showDatePicker(
                  context: context,
                  firstDate: DateTime(2020),
                  lastDate: DateTime(2030),
                  initialDate: DateTime.now(),
                );
                if (pick != null) setState(() => tgl = pick);
              },
              child: Container(
                padding: const EdgeInsets.symmetric(vertical: 16, horizontal: 16),
                decoration: BoxDecoration(
                  color: Colors.white,
                  border: Border.all(color: Colors.blue.shade300),
                  borderRadius: BorderRadius.circular(12),
                ),
                child: Row(
                  mainAxisAlignment: MainAxisAlignment.spaceBetween,
                  children: [
                    Text(
                      tgl == null
                          ? "Pilih Tanggal"
                          : DateFormat("yyyy-MM-dd").format(tgl!),
                      style: TextStyle(
                        color: Colors.blue.shade700,
                        fontSize: 16,
                      ),
                    ),
                    Icon(Icons.calendar_today, color: Colors.blue.shade700)
                  ],
                ),
              ),
            ),

            const SizedBox(height: 40),

            // BUTTON SUBMIT
            SizedBox(
              width: double.infinity,
              child: loading
                  ? const Center(child: CircularProgressIndicator())
                  : ElevatedButton(
                      style: ElevatedButton.styleFrom(
                        backgroundColor: Colors.blue.shade600,
                        padding: const EdgeInsets.symmetric(vertical: 15),
                        shape: RoundedRectangleBorder(
                          borderRadius: BorderRadius.circular(14),
                        ),
                      ),
                      onPressed: submit,
                      child: const Text(
                        "Ajukan",
                        style: TextStyle(
                          fontSize: 17,
                          fontWeight: FontWeight.bold,
                          color: Colors.white,
                        ),
                      ),
                    ),
            ),
          ],
        ),
      ),
    );
  }
}

import 'package:flutter/material.dart';
import 'package:go_router/go_router.dart';
import '../../../routes/app_routes.dart';

class PilihSuratPage extends StatelessWidget {
  final List<String> jenis = ["Izin", "Sakit", "Tugas"];

  PilihSuratPage({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: Colors.blue.shade50,
      appBar: AppBar(
        backgroundColor: const Color.fromARGB(255, 106, 141, 171),
        elevation: 0,
        centerTitle: true,
        title: const Text(
          "Pilih Jenis Surat",
          style: TextStyle(
            fontWeight: FontWeight.bold,
          ),
        ),
      ),

      body: Center(
        child: ListView.separated(
          shrinkWrap: true,
          padding: const EdgeInsets.symmetric(horizontal: 40),
          itemCount: jenis.length,
          separatorBuilder: (_, __) => const SizedBox(height: 20),
          itemBuilder: (context, index) {
            return InkWell(
              borderRadius: BorderRadius.circular(14),
              onTap: () {
                context.push(AppRoutes.formSurat, extra: jenis[index]);
              },
              child: Container(
                padding: const EdgeInsets.symmetric(vertical: 18),
                decoration: BoxDecoration(
                  color: Colors.white,
                  borderRadius: BorderRadius.circular(14),
                  boxShadow: [
                    BoxShadow(
                      color: Colors.blue.shade100,
                      blurRadius: 8,
                      offset: const Offset(0, 3),
                    ),
                  ],
                ),
                child: Center(
                  child: Text(
                    "Surat ${jenis[index]}",
                    style: TextStyle(
                      fontSize: 18,
                      fontWeight: FontWeight.w600,
                      color: Colors.blue.shade700,
                    ),
                  ),
                ),
              ),
            );
          },
        ),
      ),
    );
  }
}

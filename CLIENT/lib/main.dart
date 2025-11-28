import 'package:flutter/material.dart';
import 'routes/app_routes.dart';

void main() {
  runApp(const MyApp());
}

class MyApp extends StatelessWidget {
  const MyApp({super.key});

  @override
  Widget build(BuildContext context) {
    return MaterialApp.router(
<<<<<<< HEAD
      debugShowCheckedModeBanner: false,
      routerConfig: AppRoutes.router,
      theme: ThemeData(
        useMaterial3: true,
        colorSchemeSeed: Colors.blue, // Primary biru
      ),
=======
      title: 'Letter App',
      theme: ThemeData(
        primarySwatch: Colors.blue,
      ),
      routerConfig: appRouter,
>>>>>>> 3e544c07ad744a462140f624dcff9c15f3812863
    );
  }
}

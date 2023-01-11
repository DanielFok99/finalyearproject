import 'package:flutter/material.dart';
import 'package:flutter/src/widgets/framework.dart';
import 'package:flutter_beep/flutter_beep.dart';
import 'package:flutter_riverpod/flutter_riverpod.dart';
import 'package:fluttertoast/fluttertoast.dart';
import 'package:mobile_scanner/mobile_scanner.dart';

class ScanPage extends ConsumerWidget {

  @override
  Widget build(BuildContext context, WidgetRef ref) {
    MobileScannerController cameraController = MobileScannerController();
    DateTime? lastScan;


    return Scaffold(
        appBar: AppBar(
          title: const Text('Scan Barcode'),
          actions: [
            IconButton(
              color: Colors.white,
              icon: ValueListenableBuilder(
                valueListenable: cameraController.torchState,
                builder: (context, state, child) {
                  switch (state as TorchState) {
                    case TorchState.off:
                      return const Icon(Icons.flash_off, color: Colors.grey);
                    case TorchState.on:
                      return const Icon(Icons.flash_on, color: Colors.yellow);
                  }
                },
              ),
              iconSize: 32.0,
              onPressed: () => cameraController.toggleTorch(),
            ),
          ],
        ),
        body: MobileScanner(
            allowDuplicates: false,
            controller: cameraController,
            onDetect: (barcode, args) {

              // if (barcode.rawValue == null) {
              //   debugPrint('Failed to scan Barcode');
              // } else {
              //   final String code = barcode.rawValue!;
              //   debugPrint('Barcode found! $code');
              //   Fluttertoast.showToast(msg: 'Barcode found! $code', toastLength: Toast.LENGTH_LONG);
              // }



              final currentScan = DateTime.now();

              if (barcode.rawValue == null) {
                debugPrint('Failed to scan Barcode');
              } else {

                if (lastScan == null || currentScan.difference(lastScan!) > const Duration(milliseconds:600)) {
                  lastScan = currentScan;
                  FlutterBeep.beep();
                  final String code = barcode.rawValue!;
                  Fluttertoast.showToast(msg: 'Barcode found! $code', toastLength: Toast.LENGTH_LONG);
                }
              }
            }));
  }
}

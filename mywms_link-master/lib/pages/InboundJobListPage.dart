import 'package:flutter/material.dart';
import 'package:flutter/src/widgets/framework.dart';
import 'package:flutter_riverpod/flutter_riverpod.dart';

class InboundJobListPage extends ConsumerWidget{
  @override
  Widget build(BuildContext context, WidgetRef ref) {
    return Scaffold(
        appBar: AppBar(
          title: const Text('Inbound Job List'),
        ),
        body: ListView.builder(
            itemCount: 10,
            itemBuilder: (BuildContext context, int index) {
              return ListTile(
                onTap: () => {Navigator.pushNamed(context, '/inbound-item')},
                leading: const Icon(Icons.list),
                trailing: const Text(
                  'GFG',
                  style: TextStyle(color: Colors.green, fontSize: 15),
                ),
                title: Text('JOB #$index'),
              );
            }));
  }

}
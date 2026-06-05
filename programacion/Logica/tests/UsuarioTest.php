<?php
/**
 * Unit tests for Usuario class
 */

require_once __DIR__ . '/../Gestion.php';

class UsuarioTest extends PHPUnit\Framework\TestCase
{
    public function testConstructorSetsPropertiesCorrectly()
    {
        $usuario = new Usuario(1, 'Juan Pérez', 'admin');
        
        $this->assertEquals(1, $usuario->getId());
        $this->assertEquals('Juan Pérez', $usuario->getNombre());
        $this->assertEquals('admin', $usuario->getTipoUsuario());
    }
    
    public function testConstructorSetsFechaRegistroToCurrentTime()
    {
        $before = date('Y-m-d H:i:s');
        $usuario = new Usuario(1, 'Test', 'user');
        $after = date('Y-m-d H:i:s');
        
        $this->assertGreaterThanOrEqual($before, $usuario->getFechaRegistro());
        $this->assertLessThanOrEqual($after, $usuario->getFechaRegistro());
    }
    
    public function testConstructorWithCustomFechaRegistro()
    {
        $customDate = '2024-01-15 10:30:00';
        $usuario = new Usuario(1, 'Test', 'admin', $customDate);
        
        $this->assertEquals($customDate, $usuario->getFechaRegistro());
    }
    
    public function testGetTipoUsuario()
    {
        $usuario = new Usuario(1, 'Test', 'tecnico');
        
        $this->assertEquals('tecnico', $usuario->getTipoUsuario());
    }
    
    public function testSetTipoUsuario()
    {
        $usuario = new Usuario(1, 'Test', 'usuario');
        $usuario->setTipoUsuario('admin');
        
        $this->assertEquals('admin', $usuario->getTipoUsuario());
    }
    
    public function testGetFechaUltimoAcceso()
    {
        $before = date('Y-m-d H:i:s');
        $usuario = new Usuario(1, 'Test', 'user');
        $after = date('Y-m-d H:i:s');
        
        $this->assertGreaterThanOrEqual($before, $usuario->getFechaUltimoAcceso());
        $this->assertLessThanOrEqual($after, $usuario->getFechaUltimoAcceso());
    }
    
    public function testActualizarUltimoAcceso()
    {
        $usuario = new Usuario(1, 'Test', 'user');
        $originalAcceso = $usuario->getFechaUltimoAcceso();
        
        sleep(1);
        $usuario->actualizarUltimoAcceso();
        $newAcceso = $usuario->getFechaUltimoAcceso();
        
        $this->assertNotEquals($originalAcceso, $newAcceso);
        $this->assertGreaterThan($originalAcceso, $newAcceso);
    }
    
    public function testDifferentUserTypes()
    {
        $types = ['admin', 'tecnico', 'usuario'];
        
        foreach ($types as $type) {
            $usuario = new Usuario(1, 'Test', $type);
            $this->assertEquals($type, $usuario->getTipoUsuario());
        }
    }
}
